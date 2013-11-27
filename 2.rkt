;; The first three lines of this file were inserted by DrRacket. They record metadata
;; about the language level of this file in a form that our tools can easily process.
#reader(lib "htdp-beginner-reader.ss" "lang")((modname |2|) (read-case-sensitive #t) (teachpacks ()) (htdp-settings #(#t constructor repeating-decimal #f #t none #f ())))
;
;(define (average x y)
 ;( / (+ x y)2))
;(average 3 5)

 ; (* 366(* 24(* 60 60))))

;(>(/ 100 3)  (/(+ 100 3)(+ 3 3)))

;(define (inputfarhenite f)
; ( *(- f 32)(/ 5 9)))
;(inputfarhenite 100)
;(define ( tip x y)
;  (* y x) )
;(tip 10 0.15)

;(define (square x)
;  (* x x))
;(square 4);
;(define (quad a b c)
;(/(- b(sqrt(-(* b b)(* 4 a c))))(* 2 a)))
;(quad 4 2 3)
;(define (circum x)
 ; (* 2 pi x))
;(circum 1);
;(string-append "hello" "world")
;(string-append "hello " "world")
;(string-append "hell" "o world")
;( max 2 3 4)
;( define (large a b c)
;(cond
;  [(= a (max a b c)) (+ a (max b c))]
;  [(= b (max  a b c)) (+ b (max a c))] 
;  [(= c (max  a b c)) (+ c (max a b))]
 ; ))
;(large1 10 1 20)

( define (large1 a b c)
   (cond
     [( and (< a  b)  (< a c) ) (+ b c)]
     [( and (< b c) (< b a)) (+ a c)]
     [( and (< c a)  (< c b)) (+ a b)]
     )
     )
(large1 8 20 10)
              ;(cond
  ; (+ 4 5)
;(cond
  ; [(positive? 5) (error "doesn't get here")])
  ; [(zero? -5) (error "doesn't get here, either")]
   ;[(positive? 5) 'h
( remainder 9 2)
(remainder -2 9)
(modulo 2 9)

(modulo 9 2)
;wierd behaviour of modulo with negative numbers
(modulo -2 9)
;predicate is a function dat returns true or false
(remainder 8 2)


( define (even a)
   ( cond
      [( = (remainder a 2) 0) true ]
      [ else false]
      ))
(even 5)

(check-expect (even 8) true)
"8 is odd"