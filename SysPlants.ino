#include <Wire.h>
#include <LiquidCrystal_I2C.h>
LiquidCrystal_I2C lcd(0x27,16,2);

#define sinalAnalog A0
#define pino_led_vermelho 9
#define pino_led_azul 10
#define pino_led_verde 11

int valor_analogico;
int chargeTime = 500;

void setup(){
  Serial.begin(9600);
  pinMode(sinalAnalog, INPUT);
  pinMode(pino_led_vermelho, OUTPUT);
  pinMode(pino_led_azul, OUTPUT);
  pinMode(pino_led_verde, OUTPUT);
  
  lcd.init(); 
  lcd.backlight();
  lcd.clear();
  lcd.setCursor(0,0);lcd.print("CARREGANDO");

for(int i = 0;i < 5; i++){
 lcd.setCursor(i,1);lcd.print(".");delay(chargeTime);
}    

  lcd.clear();
  lcd.setCursor(0,0);lcd.print("SISTEMA INICIADO");
  lcd.setCursor(0,1);lcd.print("---SYS PLANTS---");
  delay(1000);

  Serial.println("CASTRO K.");
  Serial.println("PQ A VIDA E UM ROLE!!"); 
}

void loop(){
 lcd.clear();
 lcd.setCursor(0,0);lcd.print("---SYS PLANTS---");
 lcd.setCursor(0,1);lcd.print("UMIDADE: ");
 valor_analogico = analogRead(sinalAnalog); //Le o valor do pino A0 do sensor
 
  //Mostra o valor da porta analogica no serial monitor
  Serial.print("Porta analogica: ");
  Serial.print(valor_analogico);
 
  //Solo umido, acende o led verde
  if (valor_analogico > 0 && valor_analogico < 500){
    Serial.println(" Status: Solo umido");
    lcdInfo("Alta");
    apagaleds();
    digitalWrite(pino_led_verde, HIGH);
  }
 
  //Solo com umidade moderada, acende led amarelo
  if (valor_analogico > 500 && valor_analogico < 800){
    Serial.println(" Status: Umidade moderada");
    lcdInfo("Moderada");
    apagaleds();
    digitalWrite(pino_led_azul, HIGH);
  }  
    //Solo seco, acende led vermelho
    if (valor_analogico > 800 && valor_analogico < 1024){
    Serial.println(" Status: Solo seco");
    lcdInfo("Baixa");
    apagaleds();
    digitalWrite(pino_led_vermelho, HIGH); 
  }
  delay(2000);
}

void lcdInfo (String texto){
lcd.setCursor(8,1);lcd.print(texto);
}
void apagaleds(){
  digitalWrite(pino_led_vermelho, LOW);
  digitalWrite(pino_led_azul, LOW);
  digitalWrite(pino_led_verde, LOW);
}
