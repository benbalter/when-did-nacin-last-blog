require 'sinatra'
require 'rss'
require 'open-uri'
require 'action_view'
include ActionView::Helpers::DateHelper

def timestamp
  url  = "http://nacin.com/feed/?#{Time.now.to_i}"
  rss  = open(url).read
  feed = RSS::Parser.parse(rss)
  feed.items.first.date
end

get "/" do
  erb :index, :locals => { :relative_time => time_ago_in_words(timestamp) }
end
