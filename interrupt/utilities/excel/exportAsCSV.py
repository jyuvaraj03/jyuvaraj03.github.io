#!/usr/bin/python

hostname = 'localhost'
username = 'arjun1001'
password = ''
database = 'INTERRUPT'

# Simple routine to run a query on a database and print the results:
def doQuery( conn ) :
    cur = conn.cursor()

    cur.execute( "SELECT *  from events;")
    
    str='"Mobile","Name","College","Email","Logicians Code","Pitch Perfect","Inquizitive","Art Attack","Clash Of Codes","Terminal Of Secrets","Presentation Hub","TechnoFair","Interrupt Challenge","Pipe The Piper","Datafication","Workshop AWS"\n'

    for mobileNo, LogiciansCode, PitchPerfect, Inquizitive, ArtAttack, ClashOfCodes, TerminalOfSecrets, PresentationHub, TechnoFair, InterruptChallenge, PipeThePiper, Datafication, WorkshopAWS in cur.fetchall():

        if(LogiciansCode==1):
                LogiciansCode="YES"
        
        if(LogiciansCode==0):
                LogiciansCode="NO"
        
        if(PitchPerfect==1):
                PitchPerfect="YES"
        
        if(PitchPerfect==0):
                PitchPerfect="NO"
        
        if(Inquizitive==1):
                Inquizitive="YES"
        
        if(Inquizitive==0):
                Inquizitive="NO"
        
        if(ArtAttack==1):
                ArtAttack="YES"
        
        if(ArtAttack==0):
                ArtAttack="NO"
        
        if(ClashOfCodes==1):
                ClashOfCodes="YES"
        
        if(ClashOfCodes==0):
                ClashOfCodes="NO"
        
        if(TerminalOfSecrets==1):
                TerminalOfSecrets="YES"
        
        if(TerminalOfSecrets==0):
                TerminalOfSecrets="NO"
        
        if(PresentationHub==1):
                PresentationHub="YES"
        
        if(PresentationHub==0):
                PresentationHub="NO"
        
        if(TechnoFair==1):
                TechnoFair="YES"

        if(TechnoFair==0):
                TechnoFair="NO"
        
        if(LogiciansCode==0):
                TechnoFair="NO"
        
        if(InterruptChallenge==1):
                InterruptChallenge="YES"
        
        if(InterruptChallenge==0):
                InterruptChallenge="NO"
        
        if(PipeThePiper==1):
                PipeThePiper="YES"
        
        if(PipeThePiper==0):
                PipeThePiper="NO"
        
        if(Datafication==1):
                Datafication="YES"
        
        if(Datafication==0):
                Datafication="NO"
    
        if(WorkshopAWS==1):
                WorkshopAWS="YES"
        
        if(WorkshopAWS==0):
                WorkshopAWS="NO"

        # We shall get the mobile number, name, email, college from the users table now

        cur1 = conn.cursor()
        cur1.execute( "SELECT name, college, email  from users where mobileNo='"+mobileNo+"';")
        str1=""

        for name, college, email in cur1.fetchall():
            str1=name+","+college+","+email

        # We have gotten the details from the user table at this point

        str+=mobileNo+","+str1+","+LogiciansCode+","+PitchPerfect+","
        str+=Inquizitive+","+ArtAttack+","+ClashOfCodes+","
        str+=TerminalOfSecrets+","+PresentationHub+","+TechnoFair+","
        str+=InterruptChallenge+","+PipeThePiper+","+Datafication+","+WorkshopAWS+"\n"

    return str;


import MySQLdb
myConnection = MySQLdb.connect( host=hostname, user=username, passwd=password, db=database )
strr=doQuery( myConnection )
myConnection.close()


print(strr)
