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

    cur.execute( "SELECT name, email from users where sentWorkshopRegistration=2;" )

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
    subject = 'AWS Workshop Registration'

    msg = MIMEMultipart()
    msg['From'] = email_user
    msg['To'] = email_send
    msg['Subject'] = subject

    body = "Hey "+nameArray[i]+",\nWe are pleased to announce that the registrations for the AWS Workshop are now officially open! You can now register to include your name in the list for the workshop. However, we do have a few guidelines that are to be noted for this event.\n\n1. Only those who have registered for Interrupt 2k18 will be able to register for this workshop.\n2. Only the first 50 registrations will be entertained for the workshop, so hurry!\n3. Participants who have been selected for the workshop will need to pay a registration fee of Rs. 100/- for the workshop on the day of Interrupt (September 29th). Alternatively, they can pay the fees online through Google Pay (Tez) to 7708026256.\n4. Those who have been selected for the workshop will be intimated with an email in a few days time.\n5. The workshop will be conducted throughout the day on 29th, so participants will not be able to take part in other events.\n6. Participants must bring their own laptop and should have a pre-existing Amazon AWS account.\n\nLink: www.interrupt2k18.in/aws/\n\nThanks and Regards,\nTeam Interrupt '18."
    
    msg.attach(MIMEText(body,'plain'))

    text = msg.as_string()
    server = smtplib.SMTP('smtp.gmail.com',587)
    server.starttls()
    server.login(email_user,email_password)

    server.sendmail(email_user,email_send,text)
    server.quit()

    print("Sent mail to "+email_send)

# The code ends here.
