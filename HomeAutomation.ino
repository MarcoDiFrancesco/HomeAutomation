#include <dht11.h>

#define DHT11_PIN2 A4 // temperature sensor n1
#define DHT11_PIN1 A6 // temperature sensor n2
#define DHTTYPE DHT11
dht11 sensorDHT;

char incoming;
int looppp = 38;

void setup() {
  Serial.begin(9600);

  pinMode(38, OUTPUT); // white living room 
  pinMode(39, OUTPUT); // white living room 
  pinMode(40, OUTPUT); // white kitchen
  pinMode(41, OUTPUT); // red
  pinMode(42, OUTPUT); // blue
  pinMode(43, OUTPUT); // yellow
  pinMode(44, OUTPUT); // yellow
}

void loop() {
  Serial.print(analogRead(A0)); Serial.print("\t"); // sound sensor main room
  Serial.print(analogRead(A1)); Serial.print("\t"); // gas sensor main room
  Serial.print(analogRead(A2)); Serial.print("\t"); // ligt sensor main room
  Serial.print(analogRead(A3)); Serial.print("\t"); // gas sensor yellow
  temperatureSensor(1); // yellow room humidity and temperature (pin A4)
  Serial.print(analogRead(A5)); Serial.print("\t"); // fire sensor red
  temperatureSensor(2); // red room humidity and temperature (pin A4)
  Serial.print(analogRead(A7)); Serial.print("\t"); // fire sensor blue
  Serial.print(analogRead(A8)); Serial.print("\t"); // smoke sensor blue
  Serial.print(analogRead(A9)); Serial.print("\t"); // light sensor blue
  Serial.print(analogRead(A10)); Serial.print("\t"); // fire sensor main room

  Serial.println(); 
  // print \n to close the string that will be sent 

  if (Serial.available()) { //emh è un if
    while (Serial.available() > 0) {
      incoming = Serial.read();

      if(looppp == 38){
        if (incoming == '1') {
          digitalWrite(38, HIGH);
          digitalWrite(39, HIGH);           
        } else {
          digitalWrite(38, LOW);
          digitalWrite(39, LOW);
        }
        looppp = 40;
      } else if(looppp == 40){
        if (incoming == '1') {
         digitalWrite(40, HIGH);
        } else {
         digitalWrite(40, LOW);
        }
        looppp = 41;
      }else if(looppp == 41){
        if (incoming == '1') {
         digitalWrite(41, HIGH);
        } else {
         digitalWrite(41, LOW);
        }
        looppp = 42;
      }else if(looppp == 42){
        if (incoming == '1') {
         digitalWrite(42, HIGH);
        } else {
         digitalWrite(42, LOW);
        }
        looppp = 43;
      }else if(looppp == 43){
        if (incoming == '1') {
         digitalWrite(43, HIGH);
         digitalWrite(44, HIGH);
        } else {
         digitalWrite(43, LOW);
         digitalWrite(44, LOW);
        }
        looppp = 38;
      }
    }
  }
  delay(500);
}

void temperatureSensor(int nSensor) {
  if (nSensor == 1) {
    sensorDHT.read(DHT11_PIN1); // read data
  } else if (nSensor == 2) {
    sensorDHT.read(DHT11_PIN2); // read data
  } else {
    Serial.print("This sensor does not exists");
  }
  Serial.print(sensorDHT.humidity, 1); 
  // print humidity
  Serial.print("\t");
  
  Serial.print(sensorDHT.temperature, 1); 
  // print temperature
  Serial.print("\t");
}

