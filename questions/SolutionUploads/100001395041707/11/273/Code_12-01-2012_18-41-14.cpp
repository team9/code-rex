#include<iostream>
#include<string>
#include<fstream>
#include<conio.h>

using std::string;
using namespace std;
char pal[20][100],largest[100];
int ting=0,large=0,i,l;
 
void printAllPalindromes(char*);
 
char* subSequence(char*,int,int);
 
int main() {
 char *largest="";
 char *s="The captain had an eye on the radar";
 printAllPalindromes(s);
 for(i=0;i<ting;i++){
   l=strlen(pal[i]);
   if(l>large){
                large=l;
                strcpy(largest,pal[i]);
               }  
                             
 }
 

 cout<<largest;
 getch();
 return 0;
}
 
char* subSequence(char* mainSequence, int from, int to){
 char * tgt = new char[to-from+1];
 for(int i=0;i<(to-from);i++){
  tgt[i] = mainSequence[i+from];
 }
 tgt[to-from] = '\0';
 return tgt;
}
 
void printAllPalindromes(char* inputText) {
 if(!inputText) {
  printf("Input cannot be null!");
  return;
 }
 if(strlen(inputText)<=2) {
  printf("Minimum three characters should be present\n");
 }
 //ODD Occuring Palindromes
 int len = strlen(inputText);
 for(int i=1;i<len-1;i++) {
  for(int j=i-1,k=i+1;j>=0&&k<len;j--,k++) {
   if(inputText[j] == inputText[k]) {
    char* subSeq = subSequence(inputText,j,k+1);
    strcpy(pal[ting++],subSeq);
    //cout<<subSeq<<endl;
    delete subSeq;
   } else {
    break;
   }
  }
 }
 //EVEN Occuring Palindromes
 for(int i=1;i<len-1;i++) {
  for(int j=i,k=i+1;j>=0&&k<len;j--,k++) {
   if(inputText[j] == inputText[k]) {
    char* subSeq = subSequence(inputText,j,k+1);
    strcpy(pal[ting++],subSeq);
    //cout<<subSeq<<endl;
    delete subSeq;
   } else {
    break;
   }
  }
 }
 
}
