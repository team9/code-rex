#include<stdio.h>
#include<string.h>
int main(){
        int l,i;
        char str[128], *ptr, c;
        FILE *fp=fopen("SampleInput.txt", "r");
        fscanf(fp, "%d", &l);
     	fgets(str, sizeof(str), fp);
     	fgets(str, sizeof(str), fp);
	fclose(fp);
	fp=fopen("SampleOutput.txt","w");
        ptr=&str[0];
        i=0;
        while(i<strlen(str)-(strlen(str)%l)){
		c=*(ptr+i-i%l+l-(1+(i%l)));
		c!=0&&c!='\n'?fprintf(fp,"%c",c):0;
                ((i+1)%l)!=0?i++:fprintf(fp, " ",i++);
        }
	i=strlen(str);
        while(i!=strlen(str)-strlen(str)%l-1){
		c=*(ptr+i);
		c!=0&&c!='\n'?fprintf(fp,"%c",c):0;
		i--;        
	}
	fclose(fp);
        return 0;
}
