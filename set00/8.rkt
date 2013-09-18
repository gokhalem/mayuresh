;; The first three lines of this file were inserted by DrRacket. They record metadata
;; about the language level of this file in a form that our tools can easily process.
#reader(lib "htdp-beginner-reader.ss" "lang")((modname |8|) (read-case-sensitive #t) (teachpacks ()) (htdp-settings #(#t constructor repeating-decimal #f #t none #f ())))
;;circ-area: Number->Number
;;GIVEN: The radius of circle.
;;RETURNS:The area of the circle.
;;Examples:
;;(circ-area 10)=>#i314.1592653589793)

(define(circ-area r)
  (* pi r r))

(circ-area 10)


;;Test:
(check-within (circ-area 10) #i314.1592653589793 0.1 ) 
