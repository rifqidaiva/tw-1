from flask import Flask,render_template, request
from flask_mysqldb import MySQL
 
app = Flask(__name__)
 
app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'perpustakaan'
 
mysql = MySQL(app)
 
@app.route('/register', methods = ['POST', 'GET'])
def form():
    return render_template('form.html')
 
@app.route('/login', methods = ['POST', 'GET'])
def registerop():
    if request.method == 'GET':
        return "Login via the login Form"
     
    if request.method == 'POST':
        cursor = mysql.connection.cursor()
        cursor.execute(''' SELECT MAX(id_user) FROM users ''')
        result = cursor.fetchone()
        id_user = result[0] + 1 if result[0] else 1
        username = request.form['username']
        password = request.form['password']
        cursor = mysql.connection.cursor()
        cursor.execute(''' INSERT INTO users VALUES(%s,%s,%s,%s)''',(id_user,username,password,'user'))
        mysql.connection.commit()
        cursor.close()
        return render_template('login.html')
 


app.run(host='localhost', port=5000)