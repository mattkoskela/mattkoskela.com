import * as React from "react"

import Navi from "../components/Navi"


const Page = () => {
  return (
    <main>
      <h1>
        About
      </h1>
      <Navi />

      <div>
        <p>
          Hey, I’m Matt! I’m a multi-time bootstrapped tech founder and CTO with two 8 figure
          exits. I am currently on a professional sabbatical while I help raise my twin boys and
          explore other creative outlets.
        </p>
        <p>
          At HackEDU, my co-founder and I noticed most security training for software engineers was
          outdated, based on boring slides, or terrible videos. This isn’t how engineers learn, so
          we leaned into Docker and built interactive, lab-based offensive and defensive secure
          coding training. We bootstrapped for 5 years and sold to a private equity firm in 2021.
          We helped grow HackEDU to ~70 employees with more than 300 customers from startups to the
          Fortune 5, and tens of thousands of developers using our platform.
        </p>
        <p>
          Previously, I ran product and engineering as the first employee at AirMap, rapidly
          building and managing a team of 25+ engineers and PM’s. I represented the company
          globally between partners (DJI, Wing, etc), ANSPs (FAA/USA, Skyguide/Switzerland,
          NATS/UK, etc), and other agencies/working groups (NASA, global UTM, and others).
          AirMap was later sold to DroneUp.
        </p>
        <p>
          At Giant Media, I bootstrapped one of the first native advertising networks. This allowed
          the largest brands in the world to build long-form YouTube content, and Giant Media would
          leverage our audience to deliver 100’s of millions of views to those videos. We sold to
          another adtech company in 2014.
        </p>
      </div>
    </main>
  )
}

export default Page

export const Head = () => <title>Matt Koskela | About</title>
