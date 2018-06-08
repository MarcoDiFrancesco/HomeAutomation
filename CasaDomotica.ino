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
  //  led(8, 13); // firstPin, lastPin

  temperatureSensor(1); // connection with pin A0
  // print humidity and temperature
  
  temperatureSensor(2); // connection with pin A1
  // print humidity and temperature

  lightSensor(1); // connection with pin A2
  // print light value
  
  lightSensor(2); // connection with pin A3
  // print light value
  
  lightSensor(3); // connection with pin A4
  // print light value
  
  Serial.print(analogRead(A4)); // print gas sensor value

  Serial.println(); // print \n to close the string that will be sent 

  if (Serial.available()) {
    while (Serial.available() > 0) {
      incoming = Serial.read();

      if (incoming == '1') {
        digitalWrite(looppp, HIGH);
      } else {
        digitalWrite(looppp, LOW);
      }
      if (looppp == 13) {
        looppp = 8;
      } else {
        looppp = looppp + 1;
      }
    }
  }
  delay(1000);
}

void temperatureSensor(int nSensor) {
  if (nSensor == 1) {
    sensore.read(DHT11_PIN1); // read data
  } else if (nSensor == 2) {
    sensore.read(DHT11_PIN2); // read data
  } else {
    Serial.print("Error");
  }
  Serial.print(sensore.humidity, 1); // print humidity
  Serial.print(sensore.temperature, 1); // print temperature
}

void led(int first, int last) { // led test
  for (int w = first; w <= last; w++) {
    digitalWrite(w, HIGH);
    delay(100);
  }

  for (int w = first; w <= last; w++) {
    digitalWrite(w, LOW);
    delay(100);
  }
}

void lightSensor(int pin) {
  Serial.print(pin);
  if (pin == 1) {
    Serial.print(analogRead(A2));
  } else if (pin == 2) {
    Serial.print(analogRead(A3));
  } else if (pin == 3) {
    Serial.print(analogRead(A4));
  } else {
    Serial.print("Error");
  }
}

