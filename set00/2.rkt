;; The first three lines of this file were inserted by DrRacket. They record metadata
;; about the language level of this file in a form that our tools can easily process.
#reader(lib "htdp-beginner-reader.ss" "lang")((modname |2|) (read-case-sensitive #t) (teachpacks ()) (htdp-settings #(#t constructor repeating-decimal #f #t none #f ())))

;;Expression Expression -> Boolean
;;GIVEN:Two expressions
;;RETURNS:Boolean result if expression1 is greater than expression2.

(>(/ 100 3)  (/(+ 100 3)(+ 3 3)))

;;Test:
(check-expect (>(/ 100 3)  (/(+ 100 3)(+ 3 3)))true)
