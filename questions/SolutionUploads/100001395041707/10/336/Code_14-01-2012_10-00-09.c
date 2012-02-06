#include<stdio.h>
#include<string.h>
#include<conio.h>

int main(){
	char str[500], word[100][50], temp[100], rev[50],largest[50];
	int ting=0,i,j, bing=0, count=0,large=0;
	printf("Enter the string: ");
	gets(str);
	for(i=0; i<strlen(str) ; i++){
		if(str[i]!=' '){
			word[bing][ting] = str[i];
			ting++;
		}else{
		     word[bing][ting] = '\0';
	 		bing++;
	 		ting= 0;
	 	}	
	 }	
	 bing++;	
	for(i=0;i<bing;i++){
	 for(j=i+1;j<bing;j++){
	   if(strcmp(word[i],word[j])==0){
	      count++;
	      strcpy(temp, word[i]);
	     }
	  }
	  if(count>large){
	   large= count;
       strcpy(largest, temp);
	  } 
	  count=0; 
	}
	j=0;
	
	for(i=(strlen(largest)-1);i>=0;i--,j++){
     rev[j]=largest[i];
    }
    rev[j]='\0';
    
    for(i=0;i<bing;i++){
	   if(strcmp(word[i],largest)==0){
	      strcpy(word[i],rev);
	     }
    }
    printf("\n");
    for(i=0;i<bing;i++)
       printf("%s ",word[i]);
	getch();
	return 0;
}
