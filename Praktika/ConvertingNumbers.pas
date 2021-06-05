PROGRAM ConvertingNumbers(INPUT, OUTPUT);
VAR
  A: ARRAY[1..10] OF INTEGER;
  N, K, Rez, I, S: INTEGER;
BEGIN {ConvertingNumbers}
  S := 0;
  Rez := 1;
  WRITE('¬ведите натуральное число n: ');
  READ(N);
  WRITE('¬ведите число k: ');
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
      WRITELN('ќтвет:', Rez)
    END
  ELSE
    WRITELN('¬ведЄнные числа не соответствуют условию задачи. ¬ведите корректные значени€.')
END. {ConvertingNumbers}
