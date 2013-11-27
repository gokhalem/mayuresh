;; The first three lines of this file were inserted by DrRacket. They record metadata
;; about the language level of this file in a form that our tools can easily process.
#reader(lib "htdp-beginner-reader.ss" "lang")((modname robot) (read-case-sensitive #t) (teachpacks ()) (htdp-settings #(#t constructor repeating-decimal #f #t none #f ())))
(require rackunit)
(require rackunit/text-ui)
(require "extras.rkt")
 
( provide initial-robot
  robot-left 
  robot-right
  robot-forward
  robot-north? 
  robot-south? 
  robot-east? 
  robot-west?
  ) 
;; DATA DEFINITION:
;;A Direction is one of
;;-- "north"
;;-- "south"
;;-- "east"
;;--"west"

;; TEMPLATE
;; Direction-fn : direction -> ??
;;(define (Direction-fn a-direction)
;;  (cond
;;    [(string=? a-direction "north")
;;    ...]
;;    [(string=? a-direction "south")    
;;     ...]
;;    [(string=? a-direction "east")
;;     ...]
;;    [(string=? a-direction "west")  
;;     ...]))    
;; robot-left : Robot -> Robot
;; GIVEN: a robot
;; RETURNS: a robot with changed direction
;;(robot-left (make-robot 15 25 "north")=>(make-robot 15 25 "west")
;; STRATEGY: structural decomposition [Direction]
;;DATA DEFINITION:
(define-struct robot(x y direction))

;;A Robot is a (make-robot Number Number Boolean)
;;x and y are coordinates of the center of robot,in pixels.
;;relative to the origin of the scene.
;;direction is an itemization data which can take value among
;;four directions.
;;TEMPLATE:
;;(define (robot-fn b)
;;  (...
;;    (robot-x b)
;;    (robot-y b)
;;    (robot-direction b)))

;;initial-robot : PosInt PosInt -> Robot
;;GIVEN: a set of (x,y) coordinates
;;RETURNS: a robot with its center at those coordinates, facing north
;;(up).
;;Example:
;;(initial-robot 15 25)=> (make-robot 15  25   "north")
;;STRATEGY: structural decomposition [Direction]
(define (initial-robot x y)
  (make-robot x y  "north"))
;;Test:
(check-expect (initial-robot 15 200) (make-robot 15  200   "north"))
;;robot-right : Robot -> Robot
;;GIVEN: a robot
;;RETURNS: a robot like the original, but turned 90 degrees right.
;;Example:
;;(robot-right (make-robot 15 200  "north")) => (make-robot 15  200   "east") 
;; STRATEGY: structural decomposition [Direction]
(define (robot-right a-robot) 
  (cond
    [(string=? (robot-direction a-robot) "north") (make-robot (robot-x a-robot)
     (robot-y a-robot)   "east") ]
    [(string=? (robot-direction a-robot) "east")  (make-robot (robot-x a-robot)  
     (robot-y a-robot)   "south")]
    [(string=? (robot-direction a-robot) "south") (make-robot (robot-x  a-robot)
     (robot-y a-robot)  "west") ]
    [(string=? (robot-direction a-robot) "west")  (make-robot (robot-x a-robot)
     (robot-y a-robot)   "north")]))
;;Tests:
(check-expect(robot-right(make-robot 15 200 "north"))(make-robot 15 200 "east"))
(check-expect(robot-right(make-robot 15 200 "east"))(make-robot 15  200 "south"))
(check-expect(robot-right(make-robot 15 200 "south"))(make-robot 15  200 "west"))
(check-expect(robot-right(make-robot 15 200 "west"))(make-robot 15  200 "north"))

;;robot-left : Robot -> Robot
;;GIVEN: a robot
;;RETURNS: a robot like the original, but turned 90 degrees  left.
;;Example:
;;(robot-left (make-robot 15 200  "north")) => (make-robot 15  200   "west") 
;; STRATEGY: structural decomposition [Direction]
(define (robot-left a-robot) 
  (cond
    [(string=?(robot-direction a-robot) "north")(make-robot (robot-x a-robot)  
     (robot-y a-robot)   "west") ]
    [(string=?(robot-direction a-robot) "west")(make-robot (robot-x a-robot)  
     (robot-y a-robot)   "south")]
    [(string=?(robot-direction a-robot) "south")(make-robot (robot-x  a-robot) 
     (robot-y a-robot)  "east") ]
    [(string=?(robot-direction a-robot) "east")(make-robot (robot-x a-robot) 
     (robot-y a-robot)   "north")]))
;;Test:
(check-expect(robot-left(make-robot 15 200  "north"))(make-robot 15 200"west"))
(check-expect(robot-left(make-robot 15 200  "west"))(make-robot 15 200 "south"))
(check-expect(robot-left(make-robot 15 200  "south"))(make-robot 15 200 "east"))
(check-expect(robot-left(make-robot 15 200  "east"))(make-robot 15 200 "north"))



;;robot-forward : Robot PosInt -> Robot
;;GIVEN: a robot and a distance
;;RETURNS: a robot like the given one, but moved forward by the
;;specified number of pixels.  If moving forward the specified number of
;;pixels would cause the robot to move from being
;;entirely inside the canvas to being even partially outside the canvas,
;;then the robot should stop at the wall.
;;STRATEGY: structural decomposition [Direction]

(define (robot-forward a-robot distance)
 (cond 
   [(and(and(string=?(robot-direction a-robot) "south")(and (>= (robot-y a-robot) 15) (<= (robot-y a-robot) 385)))(<= distance (- 385 (robot-y a-robot))))(make-robot (robot-x a-robot)  (+(robot-y a-robot) distance)  "south")]
   [(and(and (string=?(robot-direction a-robot) "north")(and (>= (robot-y a-robot) 15) (<= (robot-y a-robot) 385)))(<= distance (-  (robot-y a-robot) 15)))(make-robot (robot-x a-robot)  (-(robot-y a-robot) distance)  "north")]
   [(and(and (string=?(robot-direction a-robot) "east") (and (>= (robot-x a-robot) 15) (<= (robot-x a-robot) 185)))(<= distance (- 185 (robot-x a-robot))))(make-robot (+ (robot-x a-robot) distance) (robot-y a-robot)   "east") ] 
   [(and(and (string=?(robot-direction a-robot) "west") (and (>= (robot-x a-robot) 15) (<= (robot-x a-robot) 185)))(<= distance (- (robot-x a-robot) 15))) (make-robot (- (robot-x a-robot) distance)(robot-y a-robot)   "west") ]
   
   
   [(and(and(and(>=(robot-x a-robot) 15) (<=(robot-x a-robot) 185))(>= (- (robot-y a-robot) distance) 15)) (string=?(robot-direction a-robot) "north")) (make-robot (robot-x a-robot) (- (robot-y a-robot) distance)   "north")]
   [(and(and(and(>=(robot-x a-robot) 15) (<=(robot-x a-robot) 185))(< (- (robot-y a-robot) distance) 15)) (string=?(robot-direction a-robot) "north")) (make-robot (robot-x a-robot) 15   "north")]
   [(and(and(or(<(robot-x a-robot) 15) (>(robot-x a-robot) 185))(or(>=(robot-y a-robot) 15) (<= (robot-y a-robot) 385))) (string=?(robot-direction a-robot) "north")) (make-robot (robot-x a-robot) (- (robot-y a-robot) distance)   "north")]
   
   [(and(and(and(>=(robot-x a-robot) 15) (<=(robot-x a-robot) 185))(<= (+ (robot-y a-robot) distance) 385)) (string=?(robot-direction a-robot) "south")) (make-robot (robot-x a-robot) (+ (robot-y a-robot) distance)   "south")]
   [(and(and(and(and(>=(robot-x a-robot) 15) (<=(robot-x a-robot) 185))(> (+ (robot-y a-robot) distance) 385)) (string=?(robot-direction a-robot) "south"))(<=(robot-x a-robot)385)) (make-robot (robot-x a-robot) 385   "south")]
   [(and(and(or(<(robot-x a-robot) 15) (> (robot-x a-robot) 185)) (or(>= (robot-y a-robot) 15) (<= (robot-y a-robot) 385))) (string=?(robot-direction a-robot) "south")) (make-robot (robot-x a-robot) (+ (robot-y a-robot) distance)   "south")]
   
   
   [(and(and(and(>=(robot-y a-robot) 15) (<=(robot-y a-robot) 385))(<= (+ (robot-x a-robot) distance) 185)) (string=?(robot-direction a-robot) "east")) ( make-robot  (+ (robot-x a-robot) distance) (robot-y a-robot)   "east")]
   [(and(and(and(and(>=(robot-y a-robot) 15) (<=(robot-y a-robot) 385))(> (+ (robot-x a-robot) distance) 185)) (string=?(robot-direction a-robot) "east"))( <= (robot-x a-robot) 185 ))  ( make-robot  185   (robot-y a-robot) "east")]
   [(and(and(and(and(>=(robot-y a-robot) 15) (<=(robot-y a-robot) 385))(> (+ (robot-x a-robot) distance) 185)) (string=?(robot-direction a-robot) "east"))( > (robot-x a-robot) 185 ))  ( make-robot  (+ (robot-x a-robot) distance)   (robot-y a-robot) "east")]
   [(and(and(or(<(robot-y a-robot) 15) (> (robot-y a-robot) 385)) (or(<=(robot-x a-robot) 15) ( >= (robot-x a-robot) 185))) (string=?(robot-direction a-robot) "east")) (make-robot (+ (robot-x a-robot) distance) (robot-y a-robot) "east")]
   
   [(and(and(and(>=(robot-y a-robot) 15) (<=(robot-y a-robot) 385))(>= (- (robot-x a-robot) distance) 15)) (string=?(robot-direction a-robot) "west")) ( make-robot  (- (robot-x a-robot) distance) (robot-y a-robot)   "west")]
   [(and(and(and(and(>=(robot-y a-robot) 15) (<=(robot-y a-robot) 385))(< (- (robot-x a-robot) distance) 15)) (string=?(robot-direction a-robot) "west"))( >= (robot-x a-robot) 15 ))  ( make-robot  15   (robot-y a-robot) "west")]
   [(and(and(and(and(>=(robot-y a-robot) 15) (<=(robot-y a-robot) 385))(< (- (robot-x a-robot) distance) 15)) (string=?(robot-direction a-robot) "west"))( < (robot-x a-robot) 15 ))  ( make-robot  (- (robot-x a-robot) distance)   (robot-y a-robot) "west")]
   [(and(and(or(<(robot-y a-robot) 15) (> (robot-y a-robot) 385)) (or(<=(robot-x a-robot) 15) ( >= (robot-x a-robot) 185))) (string=?(robot-direction a-robot) "west")) (make-robot (- (robot-x a-robot) distance) (robot-y a-robot) "west")]  ))
;;Test:
(check-expect (robot-forward (make-robot 20 300 "north") 285) 
              (make-robot 20 15 "north"))
(check-expect (robot-forward (make-robot 20 300 "south") 85)  
              (make-robot 20 385 "south"))
(check-expect (robot-forward (make-robot 20 300 "north") 286) 
              (make-robot 20 15 "north") )
(check-expect (robot-forward (make-robot 20 300 "south") 86)  
              (make-robot  20 385 "south"))
(check-expect (robot-forward (make-robot 20 300 "east")  166) 
              (make-robot 185 300 "east"))
(check-expect (robot-forward (make-robot 20 300 "east")  100) 
              (make-robot 120 300 "east"))
(check-expect (robot-forward (make-robot 20 300 "east")  165) 
              (make-robot 185 300 "east"))
(check-expect (robot-forward (make-robot 20 300 "west")   5)  
              (make-robot   15 300 "west"))
(check-expect (robot-forward (make-robot 20 300 "west")    6) 
              (make-robot   15 300 "west"))
(check-expect (robot-forward (make-robot 16 450 "north") 434) 
              (make-robot   16 16 "north"))
(check-expect (robot-forward (make-robot 201 450 "north") 600) 
              (make-robot   201 -150 "north"))
(check-expect (robot-forward (make-robot 25 -10  "south") 394) 
              (make-robot   25 384 "south"))
(check-expect (robot-forward (make-robot 25 -10  "south") 399) 
              (make-robot   25 385 "south"))
(check-expect (robot-forward (make-robot 225 -10 "south") 399) 
              (make-robot  225 389 "south"))
(check-expect (robot-forward (make-robot 225 401 "south") 399) 
              (make-robot  225 800 "south"))
(check-expect (robot-forward (make-robot 14  12  "north") 399) 
              (make-robot    14 -387 "north"))
(check-expect (robot-forward (make-robot 200 15  "north") 399) 
              (make-robot  200 -384 "north"))
(check-expect (robot-forward (make-robot 185 385  "north") 399)
              (make-robot  185 15 "north"))
(check-expect (robot-forward (make-robot 185 385  "south") 399)
              (make-robot  185 385 "south"))
(check-expect (robot-forward (make-robot  0  15  "south") 399) 
              (make-robot   0 414  "south"))
(check-expect (robot-forward (make-robot  15  15  "south") 399)
              (make-robot  15 385  "south"))
(check-expect (robot-forward (make-robot  15 15  "east")  196) 
              (make-robot  185 15 "east"))
(check-expect (robot-forward (make-robot  0  14  "east")  266) 
              (make-robot   266 14 "east"))
(check-expect (robot-forward (make-robot  185 16  "east")  5)  
              (make-robot 185 16 "east"))
(check-expect (robot-forward (make-robot  15 15  "east")  150) 
              (make-robot 165 15 "east"))
(check-expect (robot-forward (make-robot  300 315 "east") 150) 
              (make-robot 450 315 "east"))
(check-expect (robot-forward (make-robot  -300 315 "west") 150)
              (make-robot -450 315 "west"))
(check-expect (robot-forward (make-robot  -300 315 "west") 150)
              (make-robot -450 315 "west"))
(check-expect (robot-forward (make-robot   200 385 "west") 266)
              (make-robot   15 385 "west"))
(check-expect (robot-forward (make-robot  185  16 "west") 179) 
              (make-robot   15 16 "west"))
(check-expect (robot-forward (make-robot  15  386  "west")266) 
              (make-robot  -251 386 "west"))
(check-expect (robot-forward (make-robot  15  385  "west") 266)
              (make-robot   15  385 "west"))
(check-expect (robot-forward (make-robot  15  16  "north") 600) 
              (make-robot  15  15 "north"))
(check-expect (robot-forward (make-robot  14  -200 "north") 600) 
              (make-robot  14 -800 "north"))
(check-expect (robot-forward (make-robot  14  386  "north") 600) 
              (make-robot  14  -214 "north"))
(check-expect (robot-forward (make-robot  14  16  "south") 600) 
              (make-robot  14  616 "south"))
(check-expect (robot-forward (make-robot  -1  -1  "south") 600) 
              (make-robot  -1  599 "south"))
(check-expect (robot-forward (make-robot  186  400  "north") 600) 
              (make-robot  186  -200 "north"))


;;robot-north? : Robot -> Boolean
;;GIVEN: a robot
;;ANSWERS: whether the robot is facing in the north direction.
;;STRATEGY: structural decomposition [Direction]

(define (robot-north? a-robot )
  (cond
    [(string=? (robot-direction a-robot) "north") "true" ]
    [else "false"]))

(check-expect (robot-north?(make-robot 15 185  "north")) "true")
(check-expect (robot-north?(make-robot 15 185  "south")) "false")
;;robot-south? : Robot -> Boolean
;;GIVEN: a robot
;;ANSWERS: whether the robot is facing in the south direction.
;;STRATEGY: structural decomposition [Direction]

(define (robot-south? a-robot )
  (cond
    [(string=? (robot-direction a-robot) "south") "true" ]
    [else "false"]))

(check-expect (robot-south?(make-robot 15 185  "south")) "true")
(check-expect (robot-south?(make-robot 15 185  "north")) "false")

;;robot-east? : Robot -> Boolean
;;GIVEN: a robot
;;ANSWERS: whether the robot is facing in the east direction.
;;STRATEGY: structural decomposition [Direction]
(define (robot-east? a-robot )
  (cond
    [(string=? (robot-direction a-robot) "east") "true" ]
    [else "false"]))

(check-expect (robot-east?(make-robot 15 185  "east")) "true")
(check-expect (robot-east?(make-robot 15 185  "south")) "false")


;;robot-west? : Robot -> Boolean
;;GIVEN: a robot
;;ANSWERS: whether the robot is facing in the west direction.
;;STRATEGY: structural decomposition [Direction]
(define (robot-west? a-robot )
  (cond
    [(string=? (robot-direction a-robot) "west") "true" ]
    [else "false"]))

(check-expect (robot-west?(make-robot 15 185  "west")) "true")
(check-expect (robot-west?(make-robot 15 185  "south")) "false")

