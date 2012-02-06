import java.io.*;
import java.util.*;
import java.lang.*;
public class palindrome
{
public static void main(String arg[])throws IOException
{
DataInputStream in=new DataInputStream(System.in);
int l,i,j,flag=1;

StringBuffer str = new StringBuffer();
String large=" ";

int ch;
FileOutputStream out = new FileOutputStream("d:/output.txt");
try {
      FileInputStream fin = new FileInputStream("d:/file.txt");
	 
      while ((ch = fin.read()) != -1)
        str.append((char) ch);
	
      fin.close();
      } 
 catch (Exception e) {
      System.out.println(e);
        }

String s = str.toString();
s=s.toLowerCase();
	 
StringTokenizer token = new StringTokenizer(s," ;,!" +".:/?' '");
do
{
 s = token.nextToken();
 l=s.length();
	
for(i=0,j=l-1;i<=j;i++,j--) 
{
	flag=1;
  if(s.charAt(i)!=s.charAt(j))
	{
		
		flag=0;
		break;
	}
	else
	{
		
 	}
}
if(flag!=0)
{
  if(large.length()<=s.length())
  {
	

	large=" ";
 	large=s;
  }
}
}while (token.hasMoreElements());

out.write(large.getBytes());
out.close();
}
} 
