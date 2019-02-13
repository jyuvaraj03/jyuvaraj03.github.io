#!/usr/bin/python

hostname = 'localhost'
username = 'arjun1001'
password = ''
database = 'INTERRUPT'

# List variables for storing all the values retrieved from the database

mobileArray=[]
nameArray=[]
emailArray=[]

# Simple routine to run a query on a database and print the results:
def doQuery( conn ) :
    cur = conn.cursor()

    cur.execute( "SELECT mobileNo, name, email from users where sentMail=2;" )

    for mobileNo, name, email in cur.fetchall() :
        mobileArray.append(mobileNo)
        nameArray.append(name)
        emailArray.append(email)


import MySQLdb
myConnection = MySQLdb.connect( host=hostname, user=username, passwd=password, db=database )
doQuery( myConnection )
myConnection.close()

import smtplib

from email import encoders
from email.mime.base import MIMEBase
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText

email_user = 'interrupt2k18@gmail.com'
email_password = ''

iterationLength=len(emailArray)

for i in range(0,iterationLength):

    email_send = emailArray[i]
    subject = 'Interrupt 2K18 Registration'

    msg = MIMEMultipart()
    msg['From'] = email_user
    msg['To'] = email_send
    msg['Subject'] = subject

    body = "Dear "+nameArray[i]+",\nYou have successfully registered for the biggest technical spectacle of the year, Interrupt 2018, a National Level Technical Symposium organized by the Department of Computer Science of Sri Venkateswara College of Engineering on 29th September, 2018 at Sri Perumbudur.\n\nYou can use your phone number ("+mobileArray[i]+") to login along with the password you chose. If you have any issues, feel free to contact us.\n\nWe look forward to having you at our campus on the 29th of September.\n\nThanks and Regards,\nTeam Interrupt '18."
    msg.attach(MIMEText(body,'plain'))

    filename='interrupt_brochure.pdf'	
    attachment=open(filename,'rb')

    part = MIMEBase('application','octet-stream')
    part.set_payload((attachment).read())
    encoders.encode_base64(part)
    part.add_header('Content-Disposition',"attachment; filename= "+filename)

    msg.attach(part)

    text = msg.as_string()
    server = smtplib.SMTP('smtp.gmail.com',587)
    server.starttls()
    server.login(email_user,email_password)

    server.sendmail(email_user,email_send,text)
    server.quit()

    print("Sent mail to "+email_send)

# The code ends here.
