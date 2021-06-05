PROGRAM ConvertingNumbers(INPUT, OUTPUT);
VAR
  A: ARRAY[1..10] OF INTEGER;
  N, K, Rez, I, S: INTEGER;
BEGIN {ConvertingNumbers}
  S := 0;
  Rez := 1;
  WRITE('Enter a natural number n: ');
  READ(N);
  WRITE('Enter a number k: ');
  READ(K);
  IF ((N >= 1) AND (N <= 109)) AND ((K >= 2) AND (K <= 10))
  THEN
    BEGIN
      WHILE N > K
      DO
        BEGIN
          S := S + 1;
          A[S] := N MOD K;
          N := N DIV K
        END;
      S := S + 1;
      A[S] := N;
      FOR I := 1 TO S
      DO
        Rez := Rez * A[I];
      FOR I := 1 TO S
      DO
        Rez := Rez - A[I];
      WRITELN('Answer:', Rez)
    END
  ELSE
    WRITELN('The entered numbers do not match the task condition. Enter the correct values.')
END. {ConvertingNumbers}
