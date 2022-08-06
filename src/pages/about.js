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
          I am a well-rounded and driven engineering and product leader who thrives managing
          product development teams, launching amazing products and then iterating on and
          supporting those products. My proven track record shows my drive and ability to execute
          across all facets of the product development process. I care deeply about building strong
          team culture.
        </p>
        <p>
          As the first employee at AirMap, I built our engineering and product teams and launched
          all of our flagship products. I drove the technical direction of AirMap towards an open
          platform, built the team required to launch that platform, and continually delivered
          innovative products to the drone market. These tools are used by millions of drones and
          hundreds of developers. I was also responsible for representing AirMap internationally to
          our important manufacturing partners (DJI, 3DR, SenseFly, etc), major developers and
          other industry stakeholders (NASA, FAA, EASA, NATS and many others).
        </p>
        <p>
          Previously I co-founded Giant Media, which was acquired by Adknowledge in March 2014.
          Giant Media built the largest native video ad network in the United States (measured by
          ComScore) and worked with most of the biggest ad agencies and brands in the world.
        </p>
        <p>
          I am always looking to connect with like-minded tech executives, software engineers,
          entrepreneurs and aviators – hit me up if you want to chat!
        </p>
      </div>
    </main>
  )
}

export default Page

export const Head = () => <title>Matt Koskela | About</title>
