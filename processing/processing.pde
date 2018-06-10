import processing.serial.*;

Serial port;
String input;

void setup()  { 
  port = new Serial(this, Serial.list()[1], 9600); 
  delay(1000);
}

void draw() {
  if(port.available()>0){
    input = port.readStringUntil('\n');
  }
  if(input != null){
    input = trim(input);
    int dataSensors[] = int(split(input,'\t'));
    loadStrings("https://www.marcodifrancesco.com/tesina/insertData.php?data1="+dataSensors[0]+"&data2="+dataSensors[1]+"&data3="+dataSensors[2]+"&data4="+dataSensors[3]+"&data5="+dataSensors[4]+"&data6="+dataSensors[5]); // remote
//  loadStrings("http://127.0.0.1/website/tesina/insertData.php?data1="+dataSensors[0]+"&data2="+dataSensors[1]+"&data3="+dataSensors[2]+"&data4="+dataSensors[3]+"&data5="+dataSensors[4]+"&data6="+dataSensors[5]); // local
  }
  
  print(input+"\n");
  
  int out[] = new int[7];
  for(int led=1;led<=6;led++){
    String resultQuery[] = loadStrings("https://www.marcodifrancesco.com/tesina/checkLed.php?led="+led); // remote
//    String resultQuery[] = loadStrings("http://127.0.0.1/website/tesina/checkLed.php?led="+led); // local
    int ledState = Integer.parseInt(resultQuery[0]);    
    out[led]=int(ledState);
    // print for testing
    print(led + " - " + ledState);  
    if (resultQuery[0].equals("1") == true) {
      println(" - ON");
    } else {
      println(" - OFF");
    }
  }
  String output = str(out[1])+str(out[2])+str(out[3])+str(out[4])+str(out[5])+str(out[6]);  
  port.write(output);
  delay(1000);
}
