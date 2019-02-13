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

    cur.execute( "SELECT name, email from users where sentOnlineEventsMail=2;" )

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
    subject = 'Interrupt 2k18 - Events Online!'

    msg = MIMEMultipart()
    msg['From'] = email_user
    msg['To'] = email_send
    msg['Subject'] = subject

    body = "Hey "+nameArray[i]+",\nAs you might know, Interrupt 2k18 has two online events taking place this year! 'Pipe The Piper', which is an online coding event hosted on HackerRank (On September 26th and 27th, 2018), and 'Interrupt Challenge', an online puzzle-solving contest and our signature event! Also, to note, winners of these events MUST be present in college on the day of Interrupt to receive their prizes and must bring ID proof along with them. Students participating in these events must currently be in college.\n\nIf you'd like to participate in these events, click the links below.\n\nInterrupt Challenge - http://interrupt2k18.in/InterruptChallenge/\nPipe The Piper - https://www.hackerearth.com/challenge/college/pipe-the-piper-day1/\n\nHope you have fun,\nTeam Interrupt '18."
    msg.attach(MIMEText(body,'plain'))
    text = msg.as_string()
    server = smtplib.SMTP('smtp.gmail.com',587)
    server.starttls()
    server.login(email_user,email_password)

    server.sendmail(email_user,email_send,text)
    server.quit()

    print("Sent mail to "+email_send)

# The code ends here.
