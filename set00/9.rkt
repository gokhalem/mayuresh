;; The first three lines of this file were inserted by DrRacket. They record metadata
;; about the language level of this file in a form that our tools can easily process.
#reader(lib "htdp-beginner-reader.ss" "lang")((modname |9|) (read-case-sensitive #t) (teachpacks ()) (htdp-settings #(#t constructor repeating-decimal #f #t none #f ())))
;;even: Number-> Boolean
;;GIVEN: Number
;;RETURNS: True or False
;;Examples:
;;even(20)=> true
( define (even a)
   ( cond
      [( = (remainder a 2) 0) true ]
      [ else false]))

(even 4)
;;Test:
(check-expect (even 30) true ) 
(check-expect (even 3) false ) 