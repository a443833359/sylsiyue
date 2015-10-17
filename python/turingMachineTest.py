import turingMachine

prog={
      (0,1):('sr',0,'r'),
      (0,0):(0,0,'r'),
      (0,'%'):(0,'%','r'),
      (0,'&'):(0,'&','h'),
      ('sr',1):('sr',1,'r'),
      ('sr',0):('sr','&','h'),
      ('sr','&'):('sinc','&','r'),
      ('sinc',1):('sinc',0,'r'),
      ('sinc',0):('sbk',1,'l'),
      ('sbk','%'):(0,'%','r'),
      ('sbk','*'):('sbk','*','l')
      }
#(state,value):(state,value,shift)

m=turingMachine.tm(['%',1,1,1,1,1,1,1,1,1,1,1,1,1],prog,0)
print(m.run())