global com_set1
global com_set2
com_set1=['A','T']
com_set2=['C','G']

def chck_DNA(a,b):
    global score
    score=0
    for s in range(0,len(a)):
        if a[s]!=b[s]:
            if b[s]=='_':
                score+=6
            elif a[s] in com_set1 and b[s] in com_set2 or b[s] in com_set1 and a[s] in com_set2:
                score+=4
            elif (a[s] and b[s]) in com_set2 or com_set1:
                score+=2
        print score        
            
    print score
                
    


try:
    prnt_DNA=raw_input()
    chld_DNA=raw_input()
    for i in prnt_DNA:
        if i.isalpha is False:
            raise ValueError
    for i in chld_DNA:
        if i.isalpha is False:
            raise ValueErrorr
    chck_DNA(prnt_DNA,chld_DNA)

except ValueError:
    pass
    
