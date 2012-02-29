#!/usr/bin/env python

"""
A simple echo server
"""
import socket
from subprocess import call
host = ''
port = 8006
bufSize = 1024
addr= (host,port)

passcode='swag6'

serverSock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
serverSock.setsockopt(socket.SOL_SOCKET, socket.SO_REUSEADDR, 1)
serverSock.bind(addr)
serverSock.listen(1)
run=1
buttons=('-','Up','-',\
		 'Left','Space','Right',\
		 '-','Down','-')
keyAction=""
while 1:
	print "Listening on port %d" % port
	clientSock, clientAddr = serverSock.accept()
	data = clientSock.recv(1024)
	print data
	if len(data) !=0:
		if data.startswith("check "):
			data=data[6:]
			print "checking %s == %s" % (data,passcode)
			if data == passcode:
				print "passcode accepted"
				clientSock.send("1")
			else:
				clientSock.send("0")
		elif data.startswith("%s " % passcode):
			#if the correct passcode is passed
			data=data[len(passcode):].strip()
			if data.startswith("text "):
				data=data[5:].strip() #data is now the string to type
				for y in range(len(data)):
					call(["xdotool", "key", "%s" % data[y]])
			else:
				split=data.split(" ")
				if split[0] == "up":
					keyAction="keyup"
				elif split[0]=="down":
					keyAction="keydown"
					
				key = int(split[1]) # parse number from left over string
				print "running xdotool %s %s" % (keyAction,buttons[key])
				call(["xdotool",keyAction, buttons[key]]) # make call
				
	clientSock.close()
	#print data.startswteith(passcode)
	#print data
	
		
print "closing server"

serverSock.close()
print "goodbye"
