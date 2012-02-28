from socket import *
host = 'localhost'
port = 8008
bufSize = 1024
addr= (host,port)

passcode='swag6'

serverSock = socket(AF_INET, SOCK_STREAM)
serverSock.bind(addr)
serverSock.listen(1)
run=1;
while 1:
	clientSock, clientAddr = serverSock.accept()
	data = clientSock.recv(1024)
	print data.startswith(passcode+' ')
	print data
	run+=1
		
print "lol"
serverSock.close()
