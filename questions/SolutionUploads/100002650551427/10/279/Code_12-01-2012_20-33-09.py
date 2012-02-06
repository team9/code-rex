#!/usr/bin/python

f = open('obama.txt')
line = f.readline()
f.close
#print line
line_array = line.split()
#print line_array

word_counter = {}

for word in line_array:
    if word in word_counter:
        word_counter[word] +=1
    else:
        word_counter[word] = 1

#print word_counter  

repeat_word = sorted(word_counter, key=word_counter.get, reverse=True)

#print repeat_word

new_line = []

for word in line_array:
    if word == repeat_word[0]:
        new_line.append(word[::-1])
    else:
        new_line.append(word)
print ' '.join(new_line)
