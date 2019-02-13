#!/usr/bin/python

hostname = 'localhost'
username = 'arjun1001'
password = ''
database = 'INTERRUPT'

# List variables for storing all the values retrieved from the database

nameArray=[]
emailArray=[]

# Simple routine to run a query on a database and print the results:
def doQuery( conn ) :
    cur = conn.cursor()

    cur.execute( "SELECT name, email from aws_workshop where sentMail=2;" )

    for name, email in cur.fetchall() :
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
    subject = 'AWS Workshop Registration! Done!'

    msg = MIMEMultipart()
    msg['From'] = email_user
    msg['To'] = email_send
    msg['Subject'] = subject

    body =  "Dear "+nameArray[i]+",\nYou have successfully registered and been selected for the Interrupt 2k18 AWS Workshop! You are required to pay Rs. 100 using the UPI ID 'sunny.napa@oksbi' within 8:30PM tonight (28th September, 2018). For any further details or queries, please contact Abhishaik (+91 8939407365) or Muralee (7845123400).\n\nYours sincerely,\nTeam Interrupt '18"

    msg.attach(MIMEText(body,'plain'))

    text = msg.as_string()
    server = smtplib.SMTP('smtp.gmail.com',587)
    server.starttls()
    server.login(email_user,email_password)

    server.sendmail(email_user,email_send,text)
    server.quit()

    print("Sent mail to "+email_send)

# The code ends here.
