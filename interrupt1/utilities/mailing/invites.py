#!/usr/bin/python

import smtplib

from email import encoders
from email.mime.base import MIMEBase
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText

email_user = 'interrupt2k18@gmail.com'
email_password = ''

# emailArray=['kumaranviswak@gmail.com','karthick.annamalai01@gmail.com','chansardrake@gmail.com','umamaheshwariethurajan@gmail.com','sneha.gayu97@gmail.com','preejaprem97@gmail.com','jaahitha@gmail.com','velmurugan.vm261@gmail.com','rockersanthosh666@gmail.com','dkeerthi77@gmil.com','kamali1998@gmail.com','jeevasudhegan1198@gmail.com','abireh1323@gmil.com','ninasampath7@gmail.com','ache.padmavathy@gmail.com','reyhathi98@gmail.com','shojasherlin@gmail.com','nirmalapoornima@gmail.com','varshas1998@gmail.com','varsha7srinivasan@gmail.com','yazhini97@gmail.com','vtmsushma@gmai.com','saicharan581@yahoo.co.in','varsha7srinivasan@gmail.com','gshyaamkanna@gmail.com','kaushikgautham69@gmail.com','bjdinesh37987@gmail.com','nevathavijayshankar@gmail.com','davidkdson@gmail.com','devana@gmail.com','2828jeni@gmal.com','sandhiyasandy897@gmail.com','anto1804938@gmail.com','remotetitius@gmail.com','sarankumar.saran80@gmail.com','smashbobby96@gmail.com','ksachin248@gmail.com','villiamsaishu98@gmail.com','nivethababu99@gmail.com','nrbhuvana@gmail.com','preethi.shalu98@gmail.com','rashikaveera@gmail.com','abinayamanimaran97@gmail.com','arulvasu17598@gmail.com','pavithrakola1998@gmail.com','aadithya11@gmail.com','shankarnarayan482@gmail.com','j.ajaykrishna1@gmail.com','subikshansundar@gmail.com','johnisaacraj1996@gmai.com','sathishg341@gmail.com','praveen17597@gmail.com']
# emailArray=['JAYAKARAN98@GMAIL.COM','GVGNANESHWAR@GMAIL.COM','SAAIPRASHAANTH@GMAIL.COM','GANESHJAI012@GMAIL.COM','MARSHALFRANC@GMAIL.COM','AJAYSABA99@GMAIL.COM','SYEDMOHAMMEDMEHDI27@GMAIL.COM','PRAKASHMAHA274@GMAIL.COM','NAVANITHAK02@GMAIL.COM','RATMATUGA@GMAIL.COM','TMANI7232@GMAIL.COM','THACHANAGORU@GMAIL.COM','VIGNESHV.0306@GMAIL.COM','SARAVANANKMULLA@GMAIL.COM','ARULCHANDRAN555@GMAIL.COM','KABILAN1110@GMAIL.COM','J.JAMBUKESHWAR@GMAIL.COM','VAMSIKAMINENI.99@GMAIL.COM','SAKTHIVIRAT77@GMAIL.COM']
#emailArray=['srinidhi.srinivasadesikan8@gmail.com','svce.poojaa@gmail.com','saiprakadh4567@gmail.com','raghaviuday@gmail.com','ramyaranganathan7@gmail.com','g.d.susheel@gmail.com','sunilsrinivaas97@gmail.com','niwek0519@gmail.com','padmashneha7@gmail.com','sahananagarajan97@gmail.com','yokeshwar@gmail.com']
# emailArray=['batman.robin98@gmail.com', 'subathrakalaiyarasi@gmail.com','selva_sudha97@yahoo.in','vikranth98h@gmail.com', 'sandeepkumaramni@gmail.com', 'samtinesp@gmail.com', 'srivatsanvj@gmail.com','sujithapv13@gmail.com', 'roopac.vigi@gmail.com', 'mee.spriya@gmail.com','sandeepr1097@gmail.com','maranvijay001@gmail.com', 'umeshravichandirans@gmail.com', 'vemasanisaikumar@gmail.com','vishvesh004@gmail.com', 'tapsrini@gmail.com','yuvarajfalcon6464@gmail.com','thanigaimurugan624@gmail.com','elangog19@gmail.com', 'krcharan.karthick@gmail.com', 'elakismee@gmail.com','haripriyaa1998@gmail.com','tilak29081998@gmail.com','vijay490650@gmail.com','bhuvanakk.2015@gmail.com','siva127rocket@gmail.com','akshuchweety98@gmail.com', 'sownthikas@gmail.com','rahulmanivasagan1@gmail.com','vinodini2597@gmail.com','vijikannan2206@gmail.com','tharafab28@gmail.com','suba21101998@gmail.com','t.swetha293@gmail.com','shalinis1487@gmail.com', 'sreshta.gk@gmail.com','suganthi0398@gmail.com','vidhyashreeravi98@gmail.com','vidhyaanbu29@gmail.com','sathishkoneru16@gmail.com','udaya4398@gmail.com','solaiabi98@gmail.com', 'rrramiksha@gmail.com','meera1165j@gmail.com', 'hpkuralofficial@gmail.com','harshni611@gmail.com', 'mansattd@gmail.com', 'mirravalliammai@gmail.com','chitrapriya8681@gmail.com', 'aishrathrehana@gmail.com','himalatha98@gmail.com','megakumar47@gmail.com', 'meghnavarman@gmail.com', 'harita.rameshbabu@gmail.com', 'sivakeerth@gmail.com','cjagadesh8@gmail.com','madumitha.2697@gmail.com','logeshkumar70@gmail.com', 'kgkarthikgowtham@gmail.com', 'sdaisyflower@gmail.com','miraglittering1997@gmail.com','monishapink27@gmail.com','harishij2897@gmail.com','maniarasan1297@gmail.com','indhusaravanan1234@gmail.com','gskkishore98@gmail.com','mathesh98@gmail.com', 'karthikaravindpmc@gmail.com', 'jaikeeerthivelan@gmail.com','hemanthanupriya97@gmail.com','lokeshbalaji1998@gmail.com','mithamadhu700@gmail.com','lawshiapriyaprabath62@gmail.com', 'raghavi.tmv@gmail.com','mpurnima29@gmail.com', 'prriyamvradha@gmail.com','nagaranivenkatesan0911@gmail.com', 'muthu.manikandan.m@gmaill.com','luharrahul909@gmail.com','priyat81097@gmail.com','maieswaran85@gmail.com','nareshkanna1997@gmail.com', 'kjnivee@gmai.com', 'narendranmythraye@gmail.com','nithyaruth17@gmail.com', 'pavi.khadheeja@gmail.com','prashanthanirudh6@gmail.com', 'rsjeece@gmail.com','nalin6101997@gmail.com', 'navinrajnowborn@gmail.com','naagapragadeesh007@gmail.com', 'khaleelu.prsnl@gmail.com','isharyalakshmi97il@gmail.com','monishasekar716@gmail.com','monishapv2015@gmail.com']

iterationLength=len(emailArray)

for i in range(0,iterationLength):

    email_send = emailArray[i]
    subject = "Interrupt 2K18 is HERE! And it's TOMORROW!"

    msg = MIMEMultipart()
    msg['From'] = email_user
    msg['To'] = email_send
    msg['Subject'] = subject

    # body="Hey there!\nSeeing that you registered for last year's INTERRUPT, SVCE's annual CSE Symposium, we thought you'd like to know that it's BACKK! And it's BIGGER and BETTER than ever!\n\nOffering more than 12 events which are both technical and non-technical, Interrupt 2k18 promises to be an extremely entertaining and fun event! This year, we are holding two online events which include 'Pipe The Piper' (a puzzle-solving challenge) and'Interrupt Challenge', our signature event. There are a lot more interesting and special events which you can participate in on the day of Interrupt itself. To register for these events and get information on other events, check out our cool Linux-themed website www.interrupt2k18.in!\n\nHaving you around last year was something we truly appreciated and we hope to see you this year too! If you haven't already registered for Interrupt 2k18, you should!\n\nYours sincerely,\nTeam Interrupt '18"

    body="Hey there!\n\nInterrupt is the national-level technical symposium of SVCE's CSE department and it's BACKK! This year's edition is going to be bigger and better than ever!\n\nOffering more than 12+ events which are both technical and non-technical, Interrupt promises to be an extremely entertaining and fun event! This year, we are conducting two online events and 10 events on the day of Interrupt. The online events include 'Pipe The Piper' (a puzzle-solving challenge) and 'Interrupt Challenge', our signature event this year. To register for these events or to get more information about them, check out our really cool Linux-themed website at www.interrupt2k18.in!\n\nWe look forward to seeing you in college on the 29th of September!\n\nCheers, Team Interrupt '18"

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
