;; The first three lines of this file were inserted by DrRacket. They record metadata
;; about the language level of this file in a form that our tools can easily process.
#reader(lib "htdp-beginner-reader.ss" "lang")((modname |5|) (read-case-sensitive #t) (teachpacks ()) (htdp-settings #(#t constructor repeating-decimal #f #t none #f ())))
;; sq : Number -> Number
;; GIVEN: A number
;; RETURNS: The square of that number.
;; Examples:
;; (sq 10)  => 100
;; (sq -4)  => 16

   (define (sq x)
           (* x x))
   (sq -3.9);
;;Test:
   (check-expect (sq 10) 100)
   (check-expect (sq -4) 16)