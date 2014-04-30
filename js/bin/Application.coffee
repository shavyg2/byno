class MapTrigger
  constructor:(trigger,map)->
    console.log trigger
    $(trigger).on("mouseover",->
      map.css("background-size","110% 110%")
      map.css("z-index","1")
    )

    $(trigger).on("mouseout",->
      map.css("background-size","100% 100%")
      map.css("z-index","0")
    )




trigger=new MapTrigger($(".map-labels #toronto"),$(".image-map #toronto"))
trigger=new MapTrigger($(".map-labels #durham"),$(".image-map #durham"))
trigger=new MapTrigger($(".map-labels #peel"),$(".image-map #peel"))
trigger=new MapTrigger($(".map-labels #york"),$(".image-map #york"))
trigger=new MapTrigger($(".map-labels #halton"),$(".image-map #halton"))
