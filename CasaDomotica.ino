#include <dht11.h>

#define DHT11_PIN2 A1 // temperature sensor n1
#define DHT11_PIN1 A0 // temperature sensor n2
#define DHTTYPE DHT11
dht11 sensore;

char incoming;
int looppp = 8;
   
void setup() {
  Serial.begin(9600);
  
  pinMode(8, OUTPUT); // led n1
  pinMode(9, OUTPUT); // led n2
  pinMode(10, OUTPUT); // led n3
  pinMode(11, OUTPUT); // led n4
  pinMode(12, OUTPUT); // led n5
  pinMode(13, OUTPUT); // led n6
}

void loop() {
  /*
  led(8, 13); // firstPin, lastPin

  temperatureSensor(1); // connection with pin A0
  temperatureSensor(2); // connection with pin A1
  lightSensor(1); // connection with pin A2
  lightSensor(2); // connection with pin A3
  lightSensor(3); // connection with pin A4

  Serial.print("Gas sensor: \t\t");
  Serial.println(analogRead(A4));
*/
  if (Serial.available())  {
    while(Serial.available()>0){
      incoming = Serial.read();
      
      if(incoming == '1'){
        digitalWrite(looppp, HIGH);  
      } else {
        digitalWrite(looppp, LOW);  
      }
      if(looppp == 13){
        looppp = 8;
      } else {
        looppp = looppp + 1;  
      }
    }
  }
  delay(1000);
}

void temperatureSensor(int nSensor) {
  Serial.print("Meteo sensor n");
  Serial.print(nSensor);
  Serial.print(", \t");
  if (nSensor == 1) {
    sensore.read(DHT11_PIN1); // READ DATA
  } else if (nSensor == 2) {
    sensore.read(DHT11_PIN2); // READ DATA
  } else {
    Serial.print("Errore");
  }

  // print data
  Serial.print("Humidity: ");
  Serial.print(sensore.humidity, 1); // Print umidità
  Serial.print("%\tTemperature: ");
  Serial.print(sensore.temperature, 1); // Print temperatura
  Serial.println("°");
}

void led(int first, int last) {
  for (int w = first; w <= last; w++) {
    digitalWrite(w, HIGH);
    delay(100);
  }

  for (int w = first; w <= last; w++) {
    digitalWrite(w, LOW);   // turn the LED on (HIGH is the voltage level)
    delay(100);
  }
}

void lightSensor(int pin){
  Serial.print("Light sensor");
  Serial.print(pin);
  Serial.print(": \t\t");
  if(pin == 1){
    if(analogRead(A2)>500){      
      Serial.print("Dark (");
    } else {
      Serial.print("Bright (");
    }
    Serial.print(analogRead(A2));
    Serial.println(")");
  } else if (pin == 2){
    if(analogRead(A3)>500){      
      Serial.print("Dark (");
    } else {
      Serial.print("Bright (");
    }
    Serial.print(analogRead(A3));
    Serial.println(")");
  } else if (pin == 3){
    if(analogRead(A4)>500){      
      Serial.print("Dark (");
    } else {
      Serial.print("Bright (");
    }
    Serial.print(analogRead(A4));
    Serial.println(")");
  } else {
    Serial.println("Error reading light sensor");
  }
}

