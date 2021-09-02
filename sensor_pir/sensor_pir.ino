

   #include <Keypad.h> 
#include <SPI.h>
#include <Ethernet.h>

byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };//Ponemos la dirección MAC de la Ethernet Shield/
IPAddress ip(192,168,0,150); //Asignamos  la IP al Arduino
EthernetServer server(80); //Creamos un servidor Web con el puerto 80 que es el puerto HTTP por defecto
String HTTP_req; // Para guardar la petición
const byte Filas = 4; //Cuatro rows
const byte Columnas = 4; //Cuatro columns
char keys[Filas][Columnas] = {
  {'1','2','3','A'},
  {'4','5','6','B'},
  {'7','8','9','C'},
  {'*','0','#','D'}
};
byte Pins_filas[Filas] = {9,8,7,6}; //Pines de conexión correspondientes a las filas
byte Pins_columnas[Columnas] = {5,4,3,10}; //Pines de conexión correspondientes a las filas

Keypad Teclado = Keypad( makeKeymap(keys), Pins_filas, Pins_columnas, Filas, Columnas );

//----------------------CONSTANTES-----------------------------------

bool disparo= false;// ALARMA
int movimiento = 0, indice=3, contador=0, ind2=5;

bool activada= false; // ESTADO DEL SISTEMA
char contrasena[6];
char contrasenaReal[6]= "11111";
int buzzer = 12;
//int p1= 2;
const int le= 11;
int led= 13;
char va [4];//INICIO
char valor [4]="111";//INICIO
char TECLA;
int pirState = LOW;           // de inicio no hay movimiento
int val = 0;  
const int LEDPin = 13;        // pin para el LED
const int PIRPin = 2;                 
void setup() 
{
    Serial.begin(9600);
 // Ethernet.begin(mac, ip);
 // server.begin();
  pinMode(led,OUTPUT);
  pinMode(le,INPUT);
//  pinMode(p1,OUTPUT);
  pinMode(buzzer,OUTPUT);
     pinMode(LEDPin, OUTPUT); 
   pinMode(PIRPin, INPUT);
}


void loop(){
 
  // PARA ACTIVAR EL SISTEMA
if(activada==false){  
 TECLA = Teclado.getKey();
    if (TECLA){
    va[indice] = TECLA;
    indice++;
    Serial.print(TECLA);
  }

  if (indice == 3){ 
    if (!strcmp(va,valor)){   
      digitalWrite(led, HIGH); 
      Serial.print("   SISTEMA ENCENDIDO... ");
      digitalWrite(buzzer,LOW); 
      activada= true;
       }       else { 
      Serial.println("   INGRESE VALOR... ");  
              }
    indice = 0;  } }

       if(activada== true){
  digitalWrite(PIRPin, LOW);
   val = digitalRead(PIRPin);
   if (val == HIGH)   //si está activado
   { 
      digitalWrite(LEDPin, HIGH);  //LED ON
      if (pirState == LOW)  //si previamente estaba apagado
      {       
        digitalWrite(led, LOW);          
        Serial.println("SE DETECTO MOVIMIENTO"); 
        delay(10000);
        digitalWrite(buzzer, HIGH); 
        Serial.println("INGRESE CONTRASEÑA");
        delay(1000);
       
       
        pirState = HIGH;
      }
   } 
   else   //si esta desactivado
   {
      digitalWrite(LEDPin, LOW); // LED OFF
      if (pirState == HIGH)  //si previamente estaba encendido
      {
        pirState = LOW;
       

      }
   }
  TECLA = Teclado.getKey();
    if (TECLA){
    va[indice] = TECLA;
    indice++;
    Serial.print(TECLA);
  }

  if (indice == 3){ 
    if (!strcmp(va,valor)){  
      buzzer==LOW;
      digitalWrite(12,LOW); 
      digitalWrite(led, HIGH); 
      Serial.print("   ALARMAS APAGADAS... ");
      delay (2000);
      Serial.print("   INGRESE EL CODIGO PARA VOLVER ACTIVAR EL SISTEMA... ");

      digitalWrite(PIRPin, LOW);
      activada= false;
       }       else { 
      Serial.println("   CONTRASEÑA INCORRECTA... "); 
      buzzer == HIGH; 
            digitalWrite(led, LOW); 
             digitalWrite(buzzer, HIGH); 
              }
    indice = 0; 
    }
    
       } 
    EthernetClient client = server.available();    // Comprobamos si hay peticiones
  if (client){  
      boolean currentLineIsBlank = true;
      while (client.connected()){ 
        if (client.available()){
          char c = client.read(); 
          HTTP_req += c;
          if(c=='\n' && currentLineIsBlank){ 
           client.println("HTTP/1.1 200 OK");
           client.println("Content-Type: text/html");
           client.println("Connection: close");
           client.println();
           client.println("<!DOCTYPE html>");   
           client.println("<html>");
           client.println("<head>");
           client.println("<title>Control del sistema</title>");
           client.println("</head>");
           client.println("<body>");
           client.println("<h1>ARDUHOME-SEGURO</h1>");
           client.println("<p>Deslice el botón para encender o apagar el sistema</p>");
           client.println("<form method=\"get\">");
           processCheckbox(client);
           client.println("</form>");
           client.println("</body>");
           client.println("</html>");
           Serial.print(HTTP_req);
           HTTP_req = "";
           break;
         }
         if(c=='\n'){
                currentLineIsBlank = true;}
              else if (c != '\r'){
                currentLineIsBlank = false;
     } 
   }   // WHile
   delay(10);      // dar tiempo
   client.stop(); // Cerra conexion
   }  // If client
}
}
void processCheckbox(EthernetClient cl)
  {  
  if (HTTP_req.indexOf("CONTROL=2") > -1)
     activada = !activada ;
     digitalWrite(2, activada);
     if (activada)
         cl.println("<input type=\"checkbox\" name=\"CONTROL\" value=\"2\" \\ onclick=\"submit();\" checked>");
     else
       cl.println("<input type=\"checkbox\" name=\"CONTROL\" value=\"2\" \\  onclick=\"submit();\">");
   }
       
