#!C:\Python39/python.exe



import cgi
import cgitb
import mysql.connector

cgitb.enable()  # for troubleshooting

form = cgi.FieldStorage()

# Connect to the MySQL database
cnx = mysql.connector.connect(user='root', password='Iamsammed@12',
                              host='localhost', database='student_registration', auth_plugin='mysql_native_password')
cursor = cnx.cursor()

# Get the username and password from the form
username = form.getvalue('username')
password = form.getvalue('password')

# Check if the form has been submitted
if username and password:
  # Check the username and password against the database
  query = 'SELECT * FROM student WHERE student_email = %s AND student_password = %s'
  cursor.execute(query, (username, password))
  if cursor.fetchone():
    message = 'Login successful'
  else:
    message = 'Login failed'
else:
  message = ''

# Close the database connection
cursor.close()
cnx.close()

# Output the HTML page
print('Content-type: text/html\n')
print('<html>')
print('<head><title>User Authentication</title></head>')
print('<body>')
print('<h1>User Authentication</h1>')
print('<form method="post">')
print('Username: <input type="text" name="username"><br>')
print('Password: <input type="password" name="password"><br>')
print('<input type="submit" value="Login">')
print('</form>')
print('<p>{}</p>'.format(message))
print('</body></html>')
