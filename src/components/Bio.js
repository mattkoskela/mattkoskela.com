import * as React from "react"
import { StaticImage } from "gatsby-plugin-image"
 
const Bio = () => {
  return (
    <div className="bio">
      <StaticImage
        className="bio-avatar"
        layout="fixed"
        formats={["auto", "webp", "avif"]}
        src="../images/profile-pic.png"
        width={50}
        height={50}
        quality={95}
        alt="Profile picture"
      />
      <p>
        Written by <strong>Matt Koskela</strong> who lives and works in San Francisco building useful things.
        {` `}
        <a href="https://twitter.com/matt_koskela">
          You should follow them on Twitter
        </a>
      </p>
    </div>
  )
}
 
 export default Bio