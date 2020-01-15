```mermaid
classDiagram

class GameManager{
    - GameObject playerObject
    - GameObject audioObject
    - GameObject canvasObject
    ~ Start()
    + Excepciones(Scene current, Scene next)
}
```