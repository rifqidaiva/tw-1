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
              ###print(data)
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
            'judul': buku_data[1],
            'foto': '/static/img/' + buku_data[2],
            'penerbit': buku_data[3],
            'bahasa': buku_data[4],
            'kategori': kategori_data[0] if kategori_data else 'Unknown',
            'genre': genre_data[0] if genre_data else 'Unknown'
        }
        return render_template('detail.html', buku=buku)
    else:
        return redirect(url_for('buku'))

@app.route("/syarat")
def syarat():
    return render_template('syarat.html')

@app.route('/logout')
def logout():
    session.pop('loggedin', None)
    session.pop('id', None)
    session.pop('username', None)
    return redirect(url_for('index'))

if __name__ == '__main__':
    app.run(debug=True)