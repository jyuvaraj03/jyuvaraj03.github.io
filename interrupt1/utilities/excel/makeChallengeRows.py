#!/usr/bin/python

hostname = 'localhost'
username = 'arjun1001'
password = ''
database = 'INTERRUPT'

# Simple routine to run a query on a database and print the results:
def doQuery( conn ) :
    cur = conn.cursor()

    cur.execute( "SELECT mobileNo from users;" )
    
    str="INSERT INTO challenge VALUES"

    for mobileNo in cur.fetchall():
        str+=" ('"+mobileNo[0]+"',0,'2000-01-01 12:00:00','2000-01-01 12:00:00',0),";
#        print(mobileNo)

    return str;


import MySQLdb
myConnection = MySQLdb.connect( host=hostname, user=username, passwd=password, db=database )
strr=doQuery( myConnection )
myConnection.close()


print(strr)
