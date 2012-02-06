import java.io.*;
import java.util.*;

public class merge
{
public static void main(String arg[])throws IOException
{
//DataInputStream in=new DataInputStream(System.in);
int l,i,j,k,h;

String str;
String count;

    FileReader fr = new FileReader("d:/file.txt");  
FileOutputStream out = new FileOutputStream("d:/output.txt");   
    BufferedReader br = new BufferedReader(fr);
   count=br.readLine();
   l=Integer.parseInt(count); 
   h=l;
   str=br.readLine();
 
 j=str.length();
String p=" ",c=" ";
 for(k=0;k<j;k+=l,h+=l)
{   
 for(i=k;i<h;i++)
  {
    p=p+str.charAt(i); 
}

   StringBuffer sb = new StringBuffer(p);
    StringBuffer sb1=sb.reverse();  
    p=sb1.toString(); 
   out.write(p.getBytes()); 
    p=" ";
}
out.close();
  }
} 
