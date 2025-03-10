from flask import Flask, render_template, request, redirect, url_for, session
from flask_mysqldb import MySQL

app = Flask(__name__)
app.secret_key = 'your_secret_key'

app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'perpustakaan'

mysql = MySQL(app)

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/register', methods=['POST', 'GET'])
def register():
    if request.method == 'POST':
        username = request.form['username']
        password = request.form['password']
        cursor = mysql.connection.cursor()
        cursor.execute('SELECT * FROM users WHERE username=%s', (username,))
        if  cursor.fetchone():
            return render_template('form.html', pesan='Username telah digunakan')
        else:
            cursor.execute('INSERT INTO users (username, password, role) VALUES (%s, %s, %s)', (username, password, 'user'))
            mysql.connection.commit()
            return render_template('form.html', pesan='Akun berhasil terdaftar')
    return render_template('form.html', pesan=None)
    
@app.route('/change_password', methods=['POST', 'GET'])
def change_password():
    if 'loggedin' in session:
        if request.method == 'POST':
            current_password = request.form['current_password']
            new_password = request.form['new_password']
            confirm_password = request.form['confirm_password']
            
            cursor = mysql.connection.cursor()
            cursor.execute('SELECT password FROM users WHERE id_user = %s', (session['id'],))
            account = cursor.fetchone()
            
            if account and account[0] == current_password:
                if new_password == confirm_password:
                    cursor.execute('UPDATE users SET password = %s WHERE id_user = %s', (new_password, session['id']))
                    mysql.connection.commit()
                    return render_template('change_password.html', pesan='Password berhasil diubah')
                else:
                    return render_template('change_password.html', pesan='Password baru tidak cocok')
            else:
                return render_template('change_password.html', pesan='Password saat ini salah')
        return render_template('change_password.html', pesan=None)
    else:
        return redirect(url_for('login'))

@app.route('/change_username', methods=['POST', 'GET'])
def change_username():
    if 'loggedin' in session:
        if request.method == 'POST':
            new_username = request.form['new_username']
            cursor = mysql.connection.cursor()
            
            # Cek apakah username sudah ada
            cursor.execute('SELECT * FROM users WHERE username = %s', (new_username,))
            existing_user = cursor.fetchone()
            
            if existing_user:
                cursor.close()
                return render_template('change_username.html', pesan='Username sudah digunakan!')
            
            # Update username jika tidak ada duplikasi
            cursor.execute('UPDATE users SET username = %s WHERE id_user = %s', (new_username, session['id']))
            mysql.connection.commit()
            cursor.close()
            
            session['username'] = new_username
            return render_template('change_username.html', pesan='Username berhasil diubah!')
        
        return render_template('change_username.html', pesan=None)
    
    return redirect(url_for('login'))


@app.route('/login', methods=['POST', 'GET'])
def login():
    if request.method == 'POST':
        username = request.form['username']
        password = request.form['password']
        cursor = mysql.connection.cursor()
        
        cursor.execute('SELECT * FROM users WHERE username=%s AND password=%s', (username, password))
        account = cursor.fetchone()
        cursor.close()
        
        cursor = mysql.connection.cursor()
        cursor.execute('SELECT * FROM buku')
        results = cursor.fetchall()

        if account:
            session['loggedin'] = True
            session['id'] = account[0]
            session['username'] = account[1]
            session['role'] = account[3]
            if account[3] == 'admin':
                return render_template('admin.html', role="admin", results = results)
            else:
                return redirect(url_for('buku'))
        else:
            return 'Invalid username/password!'
    return render_template('login.html')

    
@app.route('/buku', methods=['POST', 'GET'])
def buku():
    if 'loggedin' in session:
        if session['username'] == 'admin':
            return render_template('admin.html')
        else:
            # ambil data dari database [{id_buku, judul, foto, penerbit, bahasa, id_kategori, id_genre}]
            cursor = mysql.connection.cursor()
            cursor.execute('SELECT id_buku, judul, foto, penerbit, bahasa, id_kategori, id_genre FROM buku')
            buku_data = cursor.fetchall()
            cursor.close()
            data = []
            for row in buku_data:
              data.append({
                'id_buku': row[0],
                'judul': row[1],
                'foto': '/static/img/' + row[2],
                'penerbit': row[3],
                'bahasa': row[4],
                'id_kategori': row[5],
                'id_genre': row[6]
              })

              # ambil data {rata-rata rating} dari tabel rating
              cursor = mysql.connection.cursor()
              cursor.execute('SELECT AVG(rating) FROM rating WHERE id_buku = %s', (row[0],))
              avg_rating = cursor.fetchone()
              cursor.close()

              data[-1]['rating'] = round(avg_rating[0], 1) if avg_rating[0] else 0
            return render_template('user.html', data=data)
    else:
        return redirect(url_for('login'))
        
@app.route("/detail/<int:id_buku>", methods=['GET'])
def detail(id_buku):
    cursor = mysql.connection.cursor()
    cursor.execute('SELECT * FROM buku WHERE id_buku = %s', (id_buku,))
    buku_data = cursor.fetchone()
    
    if buku_data:
        id_genre = buku_data[6]
        id_kategori = buku_data[5]
        
        cursor.execute('SELECT genre FROM genre WHERE id_genre = %s', (id_genre,))
        genre_data = cursor.fetchone()
        
        cursor.execute('SELECT kategori FROM kategori WHERE id_kategori = %s', (id_kategori,))
        kategori_data = cursor.fetchone()
        
        buku = {
            'id_buku': buku_data[0],
            'judul': buku_data[1],
            'foto': '/static/img/' + buku_data[2],
            'penerbit': buku_data[3],
            'bahasa': buku_data[4],
            'kategori': kategori_data[0] if kategori_data else 'Unknown',
            'genre': genre_data[0] if genre_data else 'Unknown',
            'deskripsi': buku_data[7]
        }

        # ambil data {rata-rata rating, rating user saat ini} dari tabel rating
        cursor.execute('SELECT AVG(rating) FROM rating WHERE id_buku = %s', (id_buku,))
        avg_rating = cursor.fetchone()

        cursor.execute('SELECT rating FROM rating WHERE id_buku = %s AND id_user = %s', (id_buku, session['id']))
        user_rating = cursor.fetchone()

        cursor.close()

        buku['rating'] = round(avg_rating[0], 1) if avg_rating[0] else 0
        buku['user_rating'] = user_rating[0] if user_rating else 0

        return render_template('detail.html', buku=buku)
    else:
        return redirect(url_for('buku'))

@app.route("/rating", methods=['POST', 'GET'])
def rating():

  if request.method == 'POST':
    # dapatkan id buku, id user, dan rating dari form
    id_buku = request.form['buku_id']
    rating = request.form['rating']
    id_user = session['id']

    # cek apakah user sudah memberikan rating
    cursor = mysql.connection.cursor()
    cursor.execute('SELECT * FROM rating WHERE id_buku = %s AND id_user = %s', (id_buku, id_user))
    rating_data = cursor.fetchone()
    cursor.close()

    # jika sudah, update rating
    if rating_data:
      cursor = mysql.connection.cursor()
      cursor.execute('UPDATE rating SET rating = %s WHERE id_buku = %s AND id_user = %s', (rating, id_buku, id_user))
      mysql.connection.commit()
      cursor.close()
    # jika belum, insert rating
    else:
      cursor = mysql.connection.cursor()
      cursor.execute('INSERT INTO rating (id_buku, id_user, rating) VALUES (%s, %s, %s)', (id_buku, id_user, rating))
      mysql.connection.commit()
      cursor.close()

    return redirect(url_for('detail', id_buku=id_buku))
  return redirect(url_for('detail/' + id_buku))

@app.route("/syarat")
def syarat():
    return render_template('syarat.html')

@app.route("/profile")
def profile():
    return render_template('profile.html')

@app.route('/logout')
def logout():
    session.pop('loggedin', None)
    session.pop('id', None)
    session.pop('username', None)
    return redirect(url_for('index'))

@app.route('/edit')
def edit():
    id_buku = request.args.get('id_buku')
    cursor = mysql.connection.cursor()
    cursor.execute('SELECT * FROM buku WHERE id_buku = %s', (id_buku,))
    databuku = cursor.fetchall()
    cursor.close()
    return render_template('edit.html', data=databuku)

@app.route('/admin', methods=['POST', 'GET'])
def admin():
    if request.method == 'POST':
        id_buku = request.form['id_buku']
        judul = request.form['judul']
        genre = request.form['genre']
        kategori = request.form['kategori']
        foto = request.form['foto_buku']
        penerbit = request.form['penerbit']
        bahasa = request.form['bahasa']
        deskripsi = request.form['deskripsi']
        cursor = mysql.connection.cursor()
        cursor.execute('UPDATE buku SET judul=%s, foto=%s, penerbit=%s, bahasa=%s, id_kategori=%s, id_genre=%s, deskripsi=%s WHERE id_buku=%s', (judul, foto, penerbit, bahasa, kategori, genre, deskripsi, id_buku))
        mysql.connection.commit()
        cursor.close()
        return redirect(url_for('admin'))
    

    cursor = mysql.connection.cursor()
    cursor.execute('SELECT * FROM buku')
    results = cursor.fetchall()
    return render_template('admin.html', results = results)

@app.route('/tambah', methods=['POST', 'GET'])
def tambah():
        return render_template('tambah.html')

@app.route('/tambahbuku', methods=['POST', 'GET'])
def tambahop():
    if request.method == 'POST':
        cursor = mysql.connection.cursor()
        id_buku = request.form['id_buku']
        judul = request.form['judul']
        foto = request.form['foto_buku']
        penerbit = request.form['penerbit']
        bahasa = request.form['bahasa']
        id_kategori = request.form['kategori']
        id_genre = request.form['genre']
        deskripsi = request.form['deskripsi']
        cursor.execute('INSERT INTO buku VALUES(%s,%s,%s,%s,%s,%s,%s,%s,%s)',(id_buku,judul,foto,penerbit,bahasa,id_kategori,id_genre,deskripsi,'Tersedia'))
        mysql.connection.commit()
        cursor.close()
        return redirect(url_for('admin'))

@app.route('/hapusbuku', methods=['GET'])
def hapusop():
    id_buku = request.args.get('id_buku')
    cursor = mysql.connection.cursor()
    cursor.execute('DELETE FROM buku WHERE id_buku = %s', (id_buku,))
    mysql.connection.commit()
    cursor.close()
    return redirect(url_for('admin'))


if __name__ == '__main__':
    app.run(debug=True)