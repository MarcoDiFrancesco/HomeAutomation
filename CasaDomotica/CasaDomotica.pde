import processing.serial.*;

Serial port;
String input;
 
void setup()  { 
  port = new Serial(this, Serial.list()[1], 9600); 
}

void draw() {
  if(port.available()>0){
    input = port.readStringUntil('\n');
  }
  print(input);
  int out[] = new int[7];
  for(int led=1;led<=6;led++){
    String resultPhp[] = loadStrings("https://www.marcodifrancesco.com/tesina/checkLed.php?led="+led); // remote
//    String resultPhp[] = loadStrings("http://127.0.0.1/website/tesina/checkLed.php?led="+led); // local
    int ledState = Integer.parseInt(resultPhp[0]);    
    out[led]=int(ledState);
    print(led + " - " + ledState);  
    if (resultPhp[0].equals("1") == true) {
      println(" - ON");
    } else {
      println(" - OFF");
    }
  }
  String output = str(out[1])+str(out[2])+str(out[3])+str(out[4])+str(out[5])+str(out[6]);  
  port.write(output);
//  delay(1000);
}
