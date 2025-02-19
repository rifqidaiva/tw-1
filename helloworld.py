from flask import Flask
from markupsafe import escape

app = Flask(__name__)

@app.route('/user/profile/<username>')
def show_user_profile(username):
    # show the user profile for that user
    return f'User {escape(username)}'

@app.route('/user/profile/')
def show_user_profile():
    # show the user profile for that user
    return f'profile'

@app.route('/post/<int:post_id>')
def show_post(post_id):
    # show the post with the given id, the id is an integer
    return f'Post {post_id}'


@app.route('/path/<path:subpath>')
def show_subpath(subpath):
    # show the subpath after /path/
    return f' {escape(subpath)}'