#include<fstream.h>
#include<iostream.h>
#include<conio.h>
#include<stdio.h>

void main()
{
	clrscr();
	FILE *input,*output;
	char ch;
	input=fopen("input.txt","r");
	output=fopen("codout.txt","w");
	while(ch!=EOF)
	{
		ch=fgetc(input);
		if(ch==EOF)
			break;
		switch(ch)
		{
			case '1':
			case '2':
			case '3':
			case '4':
			case '5':
			case '6':
			case '7':
			case '8':
			case '9':
			case '0':	break;
			case 'c':	fputc('2',output);
			case 'b': fputc('2',output);
			case 'a':	fputc('2',output);
					break;
			case 'f':	fputc('3',output);
			case 'e': fputc('3',output);
			case 'd':	fputc('3',output);
					break;
			case 'i':	fputc('4',output);
			case 'h': fputc('4',output);
			case 'g':	fputc('4',output);
					break;
			case 'l':	fputc('5',output);
			case 'k': fputc('5',output);
			case 'j':	fputc('5',output);
					break;
			case 'o':	fputc('6',output);
			case 'n': fputc('6',output);
			case 'm':	fputc('6',output);
					break;
			case 's':	fputc('7',output);
			case 'r':	fputc('7',output);
			case 'q': fputc('7',output);
			case 'p':	fputc('7',output);
					break;
			case 'v':	fputc('8',output);
			case 'u': fputc('8',output);
			case 't':	fputc('8',output);
					break;
			case 'z':	fputc('9',output);
			case 'y':	fputc('9',output);
			case 'x': fputc('9',output);
			case 'w':	fputc('9',output);
					break;
			case ' ':	fputc('0',output);
					break;
			default: 	fputc(ch,output);
					break;
		}

	}
	fclose(input);
	getch();
}