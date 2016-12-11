<?php 
header('Content-Type: application/json');
$handel=fopen("kurteshi_tv_program.json", 'w');

$url=simplexml_load_file("kurteshi_tv_Program.xml");
//$json=array();
//$json =[json_encode($url,JSON_PRETTY_PRINT)];
$json =json_encode($url,JSON_PRETTY_PRINT);

$fwrite=fwrite($handel, $json);
if(!$fwrite){
	echo "Something went wrong...\n";
	
}
else {

	echo "Data hase been successfully written to the file...\n";
	echo  $json;
}


?>

package com.company;

import java.io.*;
import org.json.JSONObject;
import org.json.XML;


public class Main{
    //*****References Used*****/

    //http://www.mkyong.com/java/how-to-read-file-from-java-bufferedreader-example/
    //https://www.mkyong.com/java/how-to-append-content-to-file-in-java/
    //http://stackoverflow.com/questions/26358684/converting-bufferedreader-to-jsonobject-or-map
    //http://stackoverflow.com/questions/26358684/converting-bufferedreader-to-jsonobject-or-map
    //http://crunchify.com/how-to-write-json-object-to-file-in-java/
    //http://www.cs.utexas.edu/~mitra/csSummer2012/cs312/lectures/fileIO.html
    //https://www.mkyong.com/java/json-simple-example-read-and-write-json/

    //***/

    /** Paths by default.
     *  private static final String FileName="kurteshi_tv_Program.xml";
     *  public static String path="C:\\Users\\Atdhe\\IdeaProjects\\xmltojson\\src\\kurteshi_tv_Program.xml";
     *  public static String pathToWrite="C:\\Users\\Atdhe\\IdeaProjects\\xmltojson\\src\\kurteshi_tv_Program.xml";
     */

    /**
     *  @PRETTY_PRINT_INDENT_FACTOR=4
     *  @String Path
     *  @String PathToWrite
     *  Currently the paths are hardcoded, need to be aware when you change the computer change also the path to your computer dir.
     */

    public static int PRETTY_PRINT_INDENT_FACTOR = 4;

    public static String path="C:\\Users\\Atdhe\\IdeaProjects\\xmltojson\\src\\kurteshi_tv_Program.xml";
    public static String pathToWrite="C:\\Users\\Atdhe\\IdeaProjects\\xmltojson\\src\\kurteshi_tv_Program.xml";

    public static String xmlFileToJson(String path,String pathToWrite) {
        try {

            FileReader fileReader = new FileReader(path);

            BufferedReader bufferedReader = new BufferedReader(fileReader);
            System.out.println(bufferedReader.readLine());
            StringBuilder builder = new StringBuilder();
            StringBuilder builderAppend = new StringBuilder();
            String line;


            while ((line = bufferedReader.readLine()) != null) {
                builderAppend = builder.append(line);

            }
            JSONObject jsonObject = XML.toJSONObject(builderAppend.toString()+"\n");
            String jsonPString = jsonObject.toString(PRETTY_PRINT_INDENT_FACTOR);

            System.out.println(jsonPString);
            try (FileWriter file = new FileWriter(pathToWrite)) {
                file.write(jsonPString);

                System.out.println("Successfully Copied JSON Object to File...");
                System.out.println("\nJSON Object: " + jsonObject);
            }
            catch(Exception e){
                e.printStackTrace();
            }
        }
        catch(Exception e){
            e.printStackTrace();
        }
        return path;
    }
    public static void main(String[] args) {

        /**
         * XmlFileToJson Function
         * @path where to pick the XML File
         * @pathToWrite where to write the Json File in our case in src/kurteshi_tv_program.json
         * The 'path' and 'pathToWrite' files are in the 'src' directory of the project by default.
         */
        xmlFileToJson(path,pathToWrite);
    }
}