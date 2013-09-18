;; The first three lines of this file were inserted by DrRacket. They record metadata
;; about the language level of this file in a form that our tools can easily process.
#reader(lib "htdp-beginner-reader.ss" "lang")((modname |10|) (read-case-sensitive #t) (teachpacks ()) (htdp-settings #(#t constructor repeating-decimal #f #t none #f ())))
;; sum-of-2-largest-numbers: Number Number Number -> Number
;; GIVEN: The 3 numbers.
;; RETURNS: The sum of largest 2 numbers.
;; Examples:
;; (sum-of-2-largest-numbers 10 15 20)  =>  30
;; (sum-of-2-largest-numbers 30 30 30)  =>  60

( define (sum-of-2-largest-numbers a b c)
   (cond
     [( and (<= a b)  (<= a c)) (+ b c)]
     [( and (<= b c)  (<= b a)) (+ a c)]
     [( and (<= c a)  (<= c b)) (+ a b)]))

(sum-of-2-largest-numbers 30 30 30)
;;Test:
(check-expect (sum-of-2-largest-numbers 3 320 30) 350 ) 
(check-expect (sum-of-2-largest-numbers 30 0 40) 70 ) 
(check-expect (sum-of-2-largest-numbers 35 30 10) 65 ) 