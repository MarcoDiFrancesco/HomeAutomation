import processing.serial.*;

Serial port;
String input;

void setup()  {
  port = new Serial(this, Serial.list()[1], 9600); // windows
  // port = new Serial(this, Serial.list()[2], 9600); // raspbian
  delay(5000);
}

void draw() {
  if(port.available()>0){
    input = port.readStringUntil('\n');
  }
  if(input != null){
    input = trim(input);
    int dataSensors[];
    dataSensors = int(split(input,'\t'));
    try{
      // link to pass in POST the data
      loadStrings("https://www.marcodifrancesco.com/tesina/insertData.php?data1="+dataSensors[0]+"&data2="+dataSensors[1]+"&data3="+dataSensors[2]+"&data4="+dataSensors[3]+"&data5="+dataSensors[4]+"&data6="+dataSensors[5]+"&data7="+dataSensors[6]+"&data8="+dataSensors[7]+"&data9="+dataSensors[8]+"&data10="+dataSensors[9]+"&data11="+dataSensors[10]+"&data12="+dataSensors[11]+"&data13="+dataSensors[12]); // remote
//      loadStrings("http://127.0.0.1/tesina/insertData.php?data1="+dataSensors[0]+"&data2="+dataSensors[1]+"&data3="+dataSensors[2]+"&data4="+dataSensors[3]+"&data5="+dataSensors[4]+"&data6="+dataSensors[5]); // remote
    } catch (Exception e) {
      System.out.println("Exception occurred");
    }
  }

  print(input+"\n");

  int out[] = new int[6];
  for(int led=1;led<=5;led++){
    // link to get from the query the led state
    String resultQuery[] = loadStrings("https://www.marcodifrancesco.com/tesina/checkLed.php?led="+led); // remote
    int ledState = Integer.parseInt(resultQuery[0]);
    out[led]=int(ledState);
  }
  
  String output = str(out[1])+str(out[2])+str(out[3])+str(out[4])+str(out[5]);
  port.write(output); // testing if works
  delay(500);
}
