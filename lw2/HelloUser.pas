PROGRAM HelloUser(INPUT, OUTPUT);
{Вывести сообщение 'Hello dear, <name>!',
 в случае отсутствия параметра name, вывести 'Hello Anonymous!'}
USES
  DOS;
VAR
  Parameters, Name: STRING;
BEGIN {HelloUser}
  WRITELN('Content-Type: text/plain');
  WRITELN;
  {Копирование QUERY_STRING в Parameters}
  Parameters := GetEnv('QUERY_STRING'); 
  IF POS('name=', Parameters) = 1
  THEN
    BEGIN
      IF POS('&', Parameters) <> 0
      THEN
        Name := COPY(Parameters, 6, POS('&', Parameters) - 6)
      ELSE
        Name := COPY(Parameters, 6, 255);
      WRITELN('Hello dear, ', Name)
    END
  ELSE
    WRITELN('Hello Anonymous!')
END. {HelloUser}