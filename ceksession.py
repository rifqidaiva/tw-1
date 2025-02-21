from flask import Flask, session, redirect, url_for

app = Flask(__name__)
app.secret_key = 'your_secret_key'

@app.route('/')
def index():
    if 'username' in session:
        if session['role'] == 'user':
            return redirect(url_for('user'))
        elif session['role'] == 'admin':
            return redirect(url_for('admin'))
    return 'Home Page'

@app.route('/user')
def user():
    return 'User Page'

@app.route('/admin')
def admin():
    return 'Admin Page'

if __name__ == '__main__':
    app.run(debug=True)