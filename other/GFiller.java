import java.util.*;
import java.lang.*;
import java.io.*;

/* Gallery page pic filler */
class GFiller
{
	public static void main (String[] args) throws java.lang.Exception
	{
		String path = "img/Gallery_Page/spring_hafle/"
 		for (int i = 28; i > 0; i--) {
            System.out.println("<div class=\"col-lg-3 col-md-4 col-xs-12 thumb\">");
            System.out.println("\t<a class=\"group2\" href=\""+path+i+".jpg\">");
            System.out.println("\t\t<img src=\"+path+i+\".jpg\" height=\"250\" width=\"250\">");
            System.out.println("\t</a>");
            System.out.println("</div>");        
        }
    }
}