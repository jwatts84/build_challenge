# Noisy Echidna CTF Build Challenge

## Quick links

[Technical Explanations and Design Choices](#technical-explanations-and-design-choices)  
[Solve Script](#solve-script)  
[Challenge Description](#challenge-description)  
[Build Instructions](#build-instructions)  
[Flag Format](#flag-format)  
[Hints](#hints)  
[Full Walkthrough](#full-walkthrough)  

## Technical Explanations and Design Choices

The vulnerability and exploit within this CTF are designed to simulate what we might find in the real world.  

**Note:** I have documented my design to show the reasons behind the build choices along the way to completing the Build Challenge.


[See DESIGN_CHOICES.md for full details](noisy_ctf/DESIGN_CHOICES.md)

## Solve Script

I have provided [a solve script](noisy_ctf/solve_script.py). Further instructions at step 6 of [BUILD_INSTRUCTIONS.md](noisy_ctf/BUILD_INSTRUCTIONS.md)


## Challenge Description

**Category:** Web  
**Difficulty:** Medium  


**Challenge URL:** http://localhost:8080

## Build Instructions
**Note:** The challenge is designed to run in Docker. 
[See BUILD_INSTRUCTIONS.md](noisy_ctf/BUILD_INSTRUCTIONS.md) for build instructions.

## Flag Format

`NOISY_ECHIDNA{...}`

## Hints

- The page search feature might have some filtering in place
- Sometimes security controls can be bypassed 
- MySQL has some interesting file operations...

## Full Walkthrough

You can see the [WALKTHROUGH.md](noisy_ctf/WALKTHROUGH.md) for full step by step of exploit path and vulnerabilty.


   


