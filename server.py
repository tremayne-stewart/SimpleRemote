from socket import *
host = 'localhost'
port = 8002
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
	print data
	print "check -"
	if data.startswith("check "):
		#data=data[4:]
		print data
		
	print "no check";
	#print data.startswith(passcode)
	#print data
	break
		
print "lol"
serverSock.close()
