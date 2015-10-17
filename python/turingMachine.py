import copy
class tm:
	class tape:
		def __init__(self,dat=[0]):
			self.dat=dat
			self.ind=0
			self.len=len(self.dat)
		def __eq__(a,b):
			return (a.dat,a.ind)==(b.dat,b.ind)
		def _lsh(self):
			if(self.ind==0):
				self.dat=[0]*shift+self.dat
				self.len+=shift
				self.ind=shift-1
			else:
				self.ind-=1
		def _rsh(self):
			self.ind+=1
			if self.len<=self.ind:
				self.dat.append(0)
				self.len+=1
		def _hsh(self):
			pass
		def shift(self,code):
			shiftd={'l':self._lsh,'h':self._hsh,'r':self._rsh}
			shiftd[code]()
		def set(self,data):
			self.dat[self.ind]=data
		def get(self):
			return self.dat[self.ind]
	def __init__(self,dat,prog,state):
		self.tape=tm.tape(dat)
		self.prog=prog
		self.state=state
	def backup(self):
		(self.tapep,self.statep)=(copy.deepcopy(self.tape),self.state)
	def step(self):
		if (self.state,self.tape.get()) in self.prog:
			sm=self.prog[(self.state,self.tape.get())]
		elif (self.state,'*') in self.prog:
			sm=self.prog[(self.state,'*')]
		self.state=sm[0]
		if(not sm[1]=='*'):
			self.tape.set(sm[1])
		self.tape.shift(sm[2])
	def stoptest(self):
		return ((self.tapep,self.statep)==(self.tape,self.state))
	def run(self):
		while True:
			self.backup()
			self.step()
			if(self.stoptest()):
				return self.tape.dat