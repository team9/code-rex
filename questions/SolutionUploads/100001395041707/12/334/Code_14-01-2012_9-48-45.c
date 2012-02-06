#include<stdio.h>
#include<string.h>
#include<conio.h>


int main() 
{ 
 //char str[220]; 
 char str[100];
 char word[20][5],rev[20][5];
 int i=0,k,j,n,bing,ting,sing=0;
 bing=0;
 printf("enter a string: "); 
 //scanf("%s",str);
 gets(str);
 while(i<strlen(str)){
  n=2;
   ting=0;
  while(n && i<strlen(str)){
   word[bing][ting++]=str[i];
   n--;
   i++;
  }
  word[bing][ting]='\0';
  bing++;
 }
 
int l=0;
k=bing;
while(k){
   
   j=0;
   for(i=(strlen(word[l])-1);i>=0;i--,j++){
     rev[l][j]=word[l][i];
   }
  rev[l][j]='\0';
  k--;
  l++;
 }

for(i=0;i<bing;i++)
  printf("%s ",rev[i]);
getch(); 
 return 0;
 }


